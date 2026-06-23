<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wallpaper;
use App\Models\Character;
use App\Models\Tag;
use App\Models\Artist;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class SEOController extends Controller
{
public function generateWallpaperPrompt(int $id): JsonResponse
{
    $wallpaper = Wallpaper::with(['characters.series', 'artists', 'tags'])->findOrFail($id);

    $wallpaperId = $wallpaper->id;
    $imageUrl = $wallpaper->original;
    
    $characterNames = [];
    $franchiseNames = [];
    $charaWithFranchise = $wallpaper->characters->map(function ($character) use (&$characterNames, &$franchiseNames) {
        $characterNames[] = $character->name;
        $franchiseName = $character->series->first()?->name;
        
        if ($franchiseName) {
            if (!in_array($franchiseName, $franchiseNames)) {
                $franchiseNames[] = $franchiseName;
            }
            return "{$character->name} ({$franchiseName})";
        }
        
        return $character->name;
    })->implode(', ');

    $tagsArray = $wallpaper->tags->pluck('name')->toArray();
    $rawTags = implode(', ', $tagsArray) ?: 'Scenery / General';
    
    $rawCharacters = $characterNames ? implode(', ', $characterNames) : (in_array('Scenery', $tagsArray) ? 'Anime Landscape' : 'Anime Character');
    $rawFranchises = $franchiseNames ? implode(', ', $franchiseNames) : 'Anime Universe';
    
    $artists = $wallpaper->artists->pluck('name')->implode(', ') ?: 'Official Art / Unknown';
    
    $resolution = 'HD';
    if ($wallpaper->width >= 3840 || $wallpaper->height >= 3840) {
        $resolution = '4K';
    } elseif ($wallpaper->width >= 2560 || $wallpaper->height >= 2560) {
        $resolution = '2K';
    } elseif ($wallpaper->width >= 1920 || $wallpaper->height >= 1920) {
        $resolution = '1080p';
    }

    $orientation = 'Unknown';
    $deviceTarget = 'General';
    if ($wallpaper->width > $wallpaper->height) {
        $orientation = 'Landscape';
        $deviceTarget = 'PC / Desktop';
    } elseif ($wallpaper->height > $wallpaper->width) {
        $orientation = 'Portrait';
        $deviceTarget = 'Mobile / Smartphone';
    } else {
        $orientation = 'Square';
        $deviceTarget = 'Profile Picture / Avatar';
    }

    $prompt = <<<EOT
You are a real, passionate human fan running a popular anime/game wallpaper blog. Your writing MUST pass as 100% human-written and bypass AI detectors (score 85%+ human). 

CRITICAL MISSION: You MUST visually analyze the image at the provided URL first. Your visual analysis will serve as the absolute foundation for the rest of the metadata.

HUMAN WRITING & LORE RULES (STRICTLY ENFORCED):
- NO AI VOCABULARY: Never use words like: delve, realm, vibrant, tapestry, embark, testament, ethereal, mesmerizing, symphony, seamless, elevate, captivate, stunning, breathtaking, undeniable, meticulous, or resonance.
- NO ROBOTIC TRANSITIONS: Never use "Furthermore", "Moreover", "Additionally", "Consequently", "In conclusion", or "Ultimately".
- SENTENCE STRUCTURE: Write conversationally. Mix very short, punchy sentences with longer ones. Use active voice.
- LORE INJECTION: If the franchise is a known universe, you MUST casually drop 1 specific jargon/term in the image_description to prove you play the game.

WALLPAPER ENTITY DATA:
- ID/Reference: {$wallpaperId}
- Image URL to Analyze: {$imageUrl}
- Character(s): {$rawCharacters}
- Franchise/Universe: {$rawFranchises}
- Artist/Creator: {$artists}
- Existing Tags: {$rawTags}
- Image Quality: {$resolution}
- Image Orientation: {$orientation}
- Target Device: {$deviceTarget}

WORKFLOW & REQUIREMENTS:

1. _image_analysis:
   DO THIS FIRST. Perform a hyper-detailed visual extraction focusing on Subject Micro-Details, Apparel & Textures, and Environment & Atmosphere.

2. slug:
   Generated directly from the seo_title. All lowercase, replace spaces with hyphens (-), and remove special characters (the # symbol should be removed).

3. image_alt (Max 125 characters):
   Literal, highly precise visual description optimized for Google Lens. 
   - Formula: [Subject micro-action] + [Clothing texture/color] + [Character] from [Franchise] + [Specific Background/Lighting].

4. seo_title (60-85 characters):
   BASED ON YOUR _image_analysis. Highly descriptive of the visual state.
   - Artist Rule: If Artist is NOT "Official Art / Unknown", include variations like "Fanart by {$artists}", "Drawn by {$artists}". If Official Art, omit the artist name.
   - Format: "[Character] [Specific Action/Expression] [Specific Setting/Outfit] [Artist Attribution] {$resolution} #{$wallpaperId}"
   - RULES: ALWAYS append "#{$wallpaperId}" at the exact end. No generic "HD 4K" stacking.

5. seo_description (145-155 characters):
   BASED STRICTLY ON YOUR _image_analysis. Write it like a casual, direct recommendation focusing on the most striking visual element.

6. image_description (80-120 words):
   Write ONE or TWO dense, punchy paragraphs. Remove all fluff.
   - Instantly break down the character's exact look, pose, and the lighting/vibe. 
   - Casually drop the lore term here and credit {$artists} if known.
   - End with a quick, practical reason why this specific layout is a god-tier {$deviceTarget} wallpaper (e.g., "dark background saves battery", "leaves perfect room for app icons").
   - CRITICAL: NO MARKUP. Obey the HUMAN WRITING RULES strictly. Keep it short but heavily detailed.

7. visual_entities (comma-separated string):
   Extract 5-7 literal visual elements seen in the image. All lowercase.

8. seo_keywords (comma-separated string):
   Generate 15 highly optimized, intent-driven long-tail keywords. MUST include a mix of:
   - Core Intent: "{$rawCharacters} {$rawFranchises} wallpaper {$resolution}"
   - Device Intent: "{$rawCharacters} {$deviceTarget} background", "{$rawFranchises} {$orientation} wallpaper"
   - Aesthetic Intent: [Dominant Color/Vibe] + "{$rawCharacters} art" (e.g., "dark neon kafka fanart")
   - Action Intent: "download {$rawCharacters} wallpaper", "clean {$rawCharacters} background"
   - Artist Attribution: "{$artists} {$rawCharacters} fanart" (only if artist is known)
   - ALL LOWERCASE. Separate by commas. Do not use generic one-word keywords.

9. schema_markup:
   Generate a valid JSON-LD structure for an "ImageObject". 
   - Set "contentUrl" to "{$imageUrl}".
   - Set "creator.name" to "{$artists}".
   - Use your generated seo_description for the "description" field.
   - Set "name" to your generated seo_title.

**CRITICAL: JSON OUTPUT SAFETY**
Your output MUST be valid, parseable JSON.
- ESCAPE ALL QUOTES inside values.
- No unescaped backslashes (\\) or backticks (`).

Return ONLY valid JSON exactly in this order, wrapped inside a Markdown code block (```json):
{
  "_image_analysis": "...",
  "slug": "...",
  "image_alt": "...",
  "seo_title": "...",
  "seo_description": "...",
  "image_description": "...",
  "visual_entities": "...",
  "seo_keywords": "...",
  "schema_markup": { ... }
}
EOT;

    return response()->json([
        'success' => true,
        'prompt'  => trim($prompt)
    ]);
}

public function generateCharacterPrompt(int $id): JsonResponse
{
    $character = Character::with(['series'])->findOrFail($id);

    $characterId = $character->id;
    $characterName = $character->name;
    $franchiseName = $character->series->first()?->name ?? 'Anime Universe';
    $characterKeywords = $character->keywords ?? 'anime aesthetic, 4k';
    $characterRole = 'character'; 
    $visualTraits = 'iconic design';

    $prompt = <<<EOT
You are an authentic, slightly nerdy fan running a personal wallpaper blog. Your writing MUST pass as 100% human-written and bypass AI detectors (score 85%+ human).

CRITICAL MISSION: You are writing high-CTR SEO metadata and page content for an IMAGE GALLERY PAGE displaying wallpapers of {$characterName}. 

LORE DATA:
- Character Name: {$characterName}
- Franchise: {$franchiseName}
- Role/Traits: {$characterRole}, {$visualTraits}
- Keywords: {$characterKeywords}

ANTI-AI WRITING RULES (STRICTLY ENFORCED):
1. ZERO MARKETING FLUFF: Never sound like a salesman. Do not use words like "ultimate", "perfect", "stunning", "elevate", "discover", "transform", "vibrant", "realm", "captivating", "seamless", "dive into", "top-notch".
2. ASYMMETRICAL SENTENCES: Humans write with varying rhythms. Use fragments. Be direct.
3. CASUAL AUTHORITY: Write like a real person sharing a folder of images with friends. Be helpful but brief. 

WORKFLOW & REQUIREMENTS:

1. _character_analytic:
   Briefly analyze why fans like {$characterName}'s design based on {$visualTraits}.

2. seo_title (50-60 characters):
   Write a highly clickable, search-optimized title that strictly FRONT-LOADS the entity names.
   CRITICAL RULES FOR TITLE:
   - PATTERN: Must follow the structure "[Character Name] [Franchise] [Quality] [Asset Type]".
   - ABBREVIATIONS: If {$franchiseName} has a popular abbreviation (e.g., Genshin Impact = GI, Honkai Star Rail = HSR, Zenless Zone Zero = ZZZ, Neverness to Everness = NTE), use the abbreviation to save space. If no obvious abbreviation exists, use the full name.
   - TITLE CASE: Capitalize The First Letter Of Every Word.
   - NO SPECIAL CHARACTERS: Strictly DO NOT use (), [], -, or |. Use only spaces to separate words.
   - REQUIRED ASSET TERMS: Must include "Wallpaper", "Wallpapers", "Fanart", or "Backgrounds".
   - REQUIRED QUALITY TERMS: Must include "HD", "4K", or "HD & 4K".
   - NO AI FLUFF: Never use "Best", "Top", "Ultimate", or "Stunning".
   - EXAMPLES OF GOOD FRONT-LOADED TITLES:
     "{$characterName} {$franchiseName} 4K Wallpapers"
     "{$characterName} {$franchiseName} Wallpapers 4K"
     "{$characterName} GI HD & 4K Fanart"
     "{$characterName} GI Fanart HD & 4K"
     "{$characterName} HSR Aesthetic Wallpapers HD"
     "{$characterName} NTE 4K Mobile Backgrounds"
     "{$characterName} NTE Mobile Backgrounds 4K"
   Generate exactly ONE title based on these constraints. Keep it under 60 characters.

3. seo_description (130-150 characters):
   Write a highly dynamic, anti-template meta description. It must sound like a real user dropping a link in a Discord server or Reddit thread.
   CRITICAL RULES FOR DESCRIPTION:
   - NO AI OPENERS: Strictly forbid starting with "Looking for...?", "Need a...?", "Discover", "Explore", or "Welcome to".
   - RANDOMIZE THE VIBE: Mentally pick ONE of these human angles to start your sentence, but vary the wording:
     * Angle A (The Hoarder): "Sharing my stash of..." or "Just an image dump of..."
     * Angle B (The Curator): "Finally compiled some clean..." or "Put together a folder of..."
     * Angle C (Direct/Casual): "Some really good {$characterName} setups I found..."
   - NO SALESMAN CTA: Do not end with "Download today!" or "Click here". Use passive, chill closures like "grab what you want", "feel free to save", or just let the sentence end naturally.

4. seo_keywords:
   Generate 12 intent-driven long-tail keywords. ALL LOWERCASE. Comma separated.

5. atomic_answer (40-50 words):
   Highly factual Entity-Relationship statement for AI Overviews. 
   - Format: "{$characterName} is a [Role] from [Franchise], recognized by [Visual Traits]. This page provides a gallery of high-resolution desktop and mobile wallpapers featuring the character."

6. description (150-200 words): 
   Write TWO highly engaging, dynamic paragraphs. You MUST randomize your narrative approach so it doesn't sound like a template.
   - Paragraph 1 (The Lore Hook): Explain WHO {$characterName} is in {$franchiseName}. Mentally roll a dice and pick ONE of these angles to write the paragraph:
     * Angle 1 (The Meta/Hype Focus): Talk about how the community/players react to them, their popularity, and then briefly touch on their {$characterRole}.
     * Angle 2 (The Story Impact): Focus heavily on their personality, a general lore vibe, and why they are unforgettable in the story.
     * Angle 3 (The Pure Aesthetic Hook): Start immediately by geeking out over how visually striking their {$visualTraits} are, then mention who they are.
    
   - Paragraph 2 (The Wallpaper Offer): Transition to the gallery. DO NOT use the same transition every time. Tell them you've compiled HD/4K wallpapers and fanart for mobile/PC. 
     * Vary your phrasing: "Scroll down to see the stash", "Grab a new background below", or "Here are some of the cleanest setups I found." Keep it casual and brief.

7. schema_markup:
   Valid JSON-LD for "ImageGallery".
   - Set "name" to seo_title.
   - Set "description" to seo_description.
   - Inside "about", create a "Person" entity with "name" set to "{$characterName}".

**CRITICAL: JSON OUTPUT SAFETY**
Return ONLY valid JSON wrapped in ```json:
{
  "_character_analytic": "...",
  "seo_title": "...",
  "seo_description": "...",
  "seo_keywords": "...",
  "atomic_answer": "...",
  "description": "...",
  "schema_markup": { ... }
}
EOT;

    return response()->json([
        'success' => true,
        'prompt'  => trim($prompt)
    ]);
}

public function generateTagPrompt(int $id): JsonResponse
{
    $tag = Tag::findOrFail($id);

    $tagName = $tag->name;

    $prompt = <<<EOT
You are an authentic, slightly nerdy fan running a personal anime/gaming wallpaper blog. Your writing MUST pass as 100% human-written and bypass AI detectors (score 85%+ human).

CRITICAL MISSION: You are writing high-CTR SEO metadata, entity data, and page content for a TAG GALLERY PAGE. This page displays a curated visual gallery for the tag "{$tagName}".

ENTITY CONTEXT:
- Tag Name: {$tagName}
- Note: This tag could represent a character, a franchise, an aesthetic (e.g., cyberpunk, dark fantasy), a visual trait (e.g., red eyes), or a genre. You must deduce its context.
- Note: Deduce if this tag is a Character, Franchise, Aesthetic, Color scheme, or Genre. Adapt your tone accordingly.

ANTI-AI WRITING RULES (STRICTLY ENFORCED):
1. ZERO MARKETING FLUFF: Never sound like a salesman. Do not use words like "ultimate", "perfect", "stunning", "elevate", "discover", "transform", "vibrant", "realm", "captivating", "seamless", "dive into", "top-notch", "meticulous".
2. ASYMMETRICAL SENTENCES: Humans write with varying rhythms. Use fragments. Be direct.
3. CASUAL AUTHORITY: Write like a real person sharing a folder of images with a Discord server. Be helpful but brief.

WORKFLOW & REQUIREMENTS:

1. _tag_analysis:
   Briefly deduce what "{$tagName}" is (Character? Franchise? Aesthetic? Color theme?). Why do anime/gaming fans search for this specific visual?

2. seo_title (40-60 characters):
   Write a search-optimized title that sounds like it was named by a real fan curating their personal collection, NOT an SEO bot.
   CRITICAL RULES:
   - DYNAMIC STRUCTURE: Do not use the exact same template every time. Rearrange the modifiers (HD, 4K, Desktop, Mobile, PC) naturally.
   - HUMAN VIBE: Avoid rigid, robotic structures. Think like a Reddit post title or a community forum thread.
   - TITLE CASE: Capitalize The First Letter. NO SPECIAL CHARACTERS ((), [], -, |). Use spaces only.
   - NATURAL MODIFIERS: Instead of aggressively stuffing "HD", you can mix in terms the community actually uses (e.g., "Clean", "Stash", "Dump", "Gallery", "Insane", "Chill").
   - NATURAL PUNCTUATION: Do not force special characters like (), [], -, or |. However, if using a simple dash or parentheses makes the title flow naturally (e.g., specifying resolution), you may use them sparingly. Otherwise, stick to clean text.
   - REQUIRED: Must prominently feature "{$tagName}" and a core asset term ("Wallpapers", "Backgrounds", "Pfps", or "Fanart").
   - NO AI TEMPLATES: Strictly ban formats like "Download [Tag] PC Wallpapers" or "Aesthetic [Tag] Backgrounds 4K Desktop".
   - EXAMPLES OF HUMAN-LIKE TITLES:
     "Clean {$tagName} Wallpapers 4K"
     "My {$tagName} Wallpaper Stash for PC & Mobile"
     "{$tagName} Backgrounds and Fanart Dump"
     "Chill {$tagName} Wallpapers in High Res"
     "{$tagName} Wallpapers That Actually Look Good"
     "Insane {$tagName} Art (4K Backgrounds)"
   Generate exactly ONE unique title. Keep it under 60 characters!

3. seo_description (130-150 characters):
   Write a highly dynamic, anti-template meta description. It must sound like a real user dropping a link.
   CRITICAL RULES:
   - NO AI OPENERS: Strictly forbid "Looking for...?", "Need a...?", "Discover", or "Welcome to".
   - RANDOMIZE THE VIBE: Mentally pick ONE of these human angles to start your sentence:
     * Angle A (The Hoarder): "Sharing my stash of..." or "Just an image dump of..."
     * Angle B (The Curator): "Finally compiled some clean..." or "Put together a folder of..."
     * Angle C (Direct/Casual): "Some really good {$tagName} setups I found..."
   - NO SALESMAN CTA: Use chill closures like "grab what you want", "feel free to save", or just let the sentence end naturally.

4. seo_keywords:
   Generate 12 intent-driven long-tail keywords (mobile and PC mixed). ALL LOWERCASE. Comma separated.

5. atomic_answer (40-50 words):
   Highly factual Entity statement designed for Google AI Overviews.
   - Format: "{$tagName} in the context of anime and gaming refers to [Brief Definition]. This page provides a curated gallery of high-resolution desktop and mobile wallpapers matching this theme."

6. description (150-200 words): 
   Write TWO highly engaging, dynamic paragraphs for the top of the tag page. MUST randomize your narrative approach.
   - Paragraph 1 (The Vibe Hook): Mentally roll a dice and pick ONE of these angles:
     * Angle 1 (The Mood/Aesthetic): Geek out over the colors, mood, or visual style of {$tagName}. Why does it look so clean on a monitor or phone?
     * Angle 2 (The Lore/Hype): If it's a specific lore/franchise term, talk about why the community loves this specific theme or era.
     * Angle 3 (Direct & Blunt): Start immediately by stating that finding good wallpapers for {$tagName} is hard, but this collection fixes that.
   - Paragraph 2 (The Gallery Pitch): Transition to the gallery. DO NOT use the same transition every time. Tell them you've compiled HD/4K setups. Keep it casual.

7. keywords (comma-separated string):
   CRITICAL ENTITY DATA. Generate a comprehensive list of synonyms, aliases, acronyms, popular nicknames, and international spellings for the tag "{$tagName}".
   - MUST Include native language writing if applicable (e.g., Japanese Romaji/Kanji/Katakana, Chinese Hanzi/Pinyin, Korean Hangul, Russian Cyrillic).
   - Include alternative related terms (e.g., if tag is "swordsman", include "samurai", "katana wielder", "kenjutsu").
   - ALL LOWERCASE. Separate each alias/synonym with a comma.

8. alt_text_pattern (string):
   Provide a generic, highly optimized Alt Text template that the developer can dynamically apply to images on this page. Use "[Subject]" or "[Action]" as placeholders.
   - Example: "{$tagName} [Subject] anime wallpaper in 4K resolution, [Dominant Color] aesthetic"

9. faqs (JSON Array):
   Generate exactly 2 conversational Q&A pairs about "{$tagName}" wallpapers to capture Voice Search traffic.
   - Keep answers under 25 words. Be direct.
   - Example Q: "Are these {$tagName} wallpapers free to download?"

10. schema_markup:
   Valid JSON-LD for an "ImageGallery".
   - Set "name" to seo_title.
   - Set "description" to seo_description.
   - Inside "about", create a "Thing" or "Concept" entity with "name" set to "{$tagName}".

**CRITICAL: JSON OUTPUT SAFETY**
Return ONLY valid JSON wrapped in ```json:
{
  "_tag_analysis": "...",
  "seo_title": "...",
  "seo_description": "...",
  "seo_keywords": "...",
  "atomic_answer": "...",
  "description": "...",
  "keywords": "...",
  "alt_text_pattern": "...",
  "faqs": [
    { "question": "...", "answer": "..." }
  ],
  "schema_markup": { ... }
}
EOT;

    return response()->json([
        'success' => true,
        'prompt'  => trim($prompt)
    ]);
}

public function generateSeriesPrompt(int $id): JsonResponse
{
    $series = Series::findOrFail($id);

    $seriesId = $series->id;
    $seriesName = $series->name;
    $seriesAlias = $series->keywords ?? 'N/A';

    $prompt = <<<EOT
You are an authentic, slightly nerdy fan and archivist running a personal wallpaper blog. Your writing MUST pass as 100% human-written and bypass AI detectors (score 85%+ human).

CRITICAL MISSION: You are writing high-CTR SEO metadata, an AI-friendly capsule, and page content for a SERIES HUB PAGE. This acts as the main gallery for the universe of "{$seriesName}".

SERIES ENTITY DATA (From Database):
- Series ID: {$seriesId}
- Series Name: {$seriesName}
- Alternate Names/Keywords: {$seriesAlias}

ANTI-AI WRITING RULES (STRICTLY ENFORCED):
1. ZERO MARKETING FLUFF: Never use words like: ultimate, perfect, stunning, elevate, discover, transform, vibrant, realm, captivating, seamless, dive into, top-notch, delve, tapestry, mesmerize.
2. ASYMMETRICAL SENTENCES: Humans write with varying rhythms. Use fragments occasionally. Be direct. Avoid starting sentences with "Furthermore", "Moreover", or "Additionally".
3. CASUAL AUTHORITY: Write like a real person sharing a massive image dump with friends on Reddit or Discord. Be helpful but brief.

WORKFLOW & REQUIREMENTS:

1. _series_analysis:
   DO THIS FIRST. Search your knowledge base for "{$seriesName}". 
   - Identify its core format (Anime, Game, Manga, or Show) and genre/aesthetic.
   - Name 2-3 iconic characters and 1-2 major locations/factions from this universe to use dynamically in the text.

2. slug:
   The URL slug. All lowercase, replace spaces with hyphens. Remove special characters.

3. seo_title (50-60 characters):
   Write a highly clickable, search-optimized title that strictly FRONT-LOADS the entity name.
   CRITICAL RULES FOR TITLE:
   - PATTERN: "[Series Name/Abbreviation] [Asset Type] [Quality] [Optional Context]" (Rearrange freely as long as the Series Name is first).
   - ABBREVIATIONS: If {$seriesName} has a widely recognized abbreviation (e.g., Genshin Impact = GI, Honkai Star Rail = HSR, Zenless Zone Zero = ZZZ), use it to save space if needed.
   - TITLE CASE: Capitalize The First Letter Of Every Word.
   - NO SPECIAL CHARACTERS: Strictly DO NOT use (), [], -, or |. Use only spaces to separate words.
   - NO AI FLUFF: Strictly avoid words like "Ultimate", "Stunning", "Complete", "Perfect", or "Best".
   - REQUIRED ASSET TERMS: Must include "Wallpapers", "Backgrounds", "Art", or "Fanart".
   - REQUIRED QUALITY TERMS: Must include "HD", "4K", or "HD & 4K".
   - EXAMPLES OF DYNAMIC TITLES (Do not copy these exactly, use them as structural inspiration):
     "{$seriesName} Clean Wallpapers 4K For PC"
     "{$seriesName} Aesthetic Phone Backgrounds HD"
     "{$seriesName} 4K Wallpapers And Official Art"
     "{$seriesName} High Res PC Setup Backgrounds"
     "{$seriesName} Minimalist Desktop Wallpapers 4K"
     "{$seriesName} Epic 4K Art And Backgrounds"
     "{$seriesName} 4K Dark Wallpapers For Mobile"
     "{$seriesName} HD Backgrounds Gallery 4K"
     "{$seriesName} Chill 4K Wallpapers For Desktop"
     "{$seriesName} 4K Wallpapers For PC And Mobile"
     "{$seriesName} HD Wallpapers And Backgrounds 4K"
     "{$seriesName} Mobile Backgrounds 4K"
     "{$seriesName} 4K PC Backgrounds HD"
     "{$seriesName} Desktop Wallpapers HD 4K"
     "{$seriesName} Art And Backgrounds 4K"
     "{$seriesName} 4K Phone Wallpapers HD"
     "{$seriesName} Wallpapers 4K And HD Fanart"
   Generate exactly ONE title based on these constraints. Keep it under 60 characters.

4. seo_description (130-150 characters):
   Write a highly dynamic, anti-template meta description. It must sound like a real user dropping a link.
   CRITICAL RULES FOR DESCRIPTION:
   - NO AI OPENERS: Strictly forbid starting with "Looking for...?", "Need a...?", "Discover", or "Explore".
   - RANDOMIZE THE VIBE: Mentally pick ONE of these human angles to start, but vary the wording:
     * Angle A (The Hoarder): "Sharing my stash of {$seriesName} backgrounds and clean fanart..."
     * Angle B (The Curator): "Finally compiled a massive folder of high-res {$seriesName} art..."
     * Angle C (Direct/Casual): "Some really clean {$seriesName} setups for PC and mobile screens..."
   - NO SALESMAN CTA: Do not end with "Download today!" or "Click here". Use passive closures like "feel free to grab what you want", "scroll through", or let it end naturally.

5. atomic_answer (40-60 words):
   Highly factual Entity-Relationship statement for AI Overviews (AEO). 
   - Format: "{$seriesName} is a [Genre from step 1] [Format from step 1] recognized for its [Visual Aesthetic/Lore Elements from step 1]. This hub page provides a massive gallery of high-resolution desktop and mobile wallpapers featuring the main characters and environments from the series."

6. description (150-200 words):
   Write TWO highly engaging, dynamic paragraphs for the page body. You MUST randomize your narrative approach.
   - Paragraph 1 (The Lore Hook): Explain the appeal of {$seriesName}. Mentally roll a dice and pick ONE angle:
     * Angle 1 (The Meta/Hype): Talk about the community's obsession with the series, its popularity, and why everyone wants its art on their screens.
     * Angle 2 (The World-Building): Focus heavily on the atmosphere, the factions, or the specific universe design that makes it look so good. Drop the location/faction names from step 1.
     * Angle 3 (The Pure Aesthetic): Geek out over the specific art style (e.g., cel-shaded, gritty cyberpunk, dark fantasy) and character designs.
   
   - Paragraph 2 (The Wallpaper Offer): Transition to the gallery below. DO NOT use the same transition every time. Tell them this page has a massive collection of images featuring the characters you found in step 1.
     * Vary your phrasing: "Scroll down to see the stash", "Grab a new background below", or "Here are some of the cleanest {$seriesName} setups I found." Keep it casual, mentioning that they fit ultrawide monitors and mobile setups perfectly.

7. seo_keywords:
   Generate 12 intent-driven long-tail keywords. ALL LOWERCASE. Comma separated. Must include: "{$seriesName} wallpapers", "{$seriesName} background 4k", and 2 keywords featuring the names of the iconic characters you identified in step 1.

8. schema_markup:
   Generate a valid JSON-LD structure for an "ImageGallery" wrapped in a "CollectionPage". 
   - Set "name" to your generated seo_title.
   - Set "description" to your generated seo_description.
   - Inside "about", create a "Thing" entity. Dynamically set "@type" to "VideoGame", "CreativeWork", or "ComicSeries" based on your step 1 analysis. 
   - Add "name": "{$seriesName}" and dynamically add a "genre" field based on your step 1 analysis.

**CRITICAL: JSON OUTPUT SAFETY**
Return ONLY valid JSON wrapped in ```json:
{
  "_series_analysis": "...",
  "slug": "...",
  "seo_title": "...",
  "seo_description": "...",
  "atomic_answer": "...",
  "description": "...",
  "seo_keywords": "...",
  "schema_markup": { ... }
}
EOT;

    return response()->json([
        'success' => true,
        'prompt'  => trim($prompt)
    ]);
}

public function generateArtistPrompt(int $id): JsonResponse
{
    // Kueri dioptimalkan dengan menghapus withCount
    $artist = Artist::findOrFail($id);

    $artistId = $artist->id;
    $artistName = $artist->name;

    $prompt = <<<EOT
You are an authentic, slightly nerdy fan and archivist running a personal wallpaper blog. Your writing MUST pass as 100% human-written and bypass AI detectors (score 85%+ human). 

CRITICAL MISSION: You are writing high-CTR SEO metadata, an AI-friendly capsule, and page content for an ARTIST HUB PAGE. This acts as a gallery displaying artworks and fanart drawn by "{$artistName}". Your goal is to rank for search queries related to this artist's illustrations.

ARTIST ENTITY DATA:
- Artist ID: {$artistId}
- Artist Name: {$artistName}

ANTI-AI WRITING RULES (STRICTLY ENFORCED):
1. ZERO MARKETING FLUFF: Never use words like: ultimate, perfect, stunning, elevate, discover, transform, vibrant, realm, captivating, seamless, dive into, top-notch, delve, tapestry, mesmerize.
2. ASYMMETRICAL SENTENCES: Humans write with varying rhythms. Use fragments occasionally. Be direct. Avoid starting sentences with "Furthermore", "Moreover", or "Additionally".
3. CASUAL AUTHORITY: Write like a real person appreciating art and sharing an image dump with friends on Reddit or Discord. Be helpful but brief.

WORKFLOW & REQUIREMENTS:

1. _artist_analysis:
   DO THIS FIRST. Tap into your knowledge base for "{$artistName}". 
   - Briefly describe their signature art style (e.g., soft lighting, sharp cel-shading, detailed backgrounds, specific coloring techniques). 
   - If they are unknown to you, generate a generic but highly appreciative analysis of modern digital anime/game illustration styles.

2. slug:
   The URL slug. All lowercase, replace spaces with hyphens. Remove special characters.

3. seo_title (50-60 characters):
   Write a highly clickable, search-optimized title that strictly FRONT-LOADS the artist's name. To avoid monotony, you MUST inject ONE natural human search modifier.
   CRITICAL RULES FOR TITLE:
   - PATTERN: "[Artist Name] [Modifier] [Asset Type] [Quality] [Context]" (Rearrange freely, but the Artist Name MUST be first).
   - HUMAN MODIFIERS (Pick ONE randomly): "Clean", "Aesthetic", "High Res", "Gallery", "Pixiv", "Twitter", "Setup", "Epic", "Chill".
   - TITLE CASE: Capitalize The First Letter Of Every Word.
   - NO SPECIAL CHARACTERS: Strictly DO NOT use (), [], -, or |. Use only spaces to separate words.
   - NO AI FLUFF: Strictly avoid words like "Ultimate", "Stunning", "Complete", or "Best".
   - REQUIRED ASSET TERMS: Must include "Fanart", "Art", "Illustrations", or "Wallpapers".
   - REQUIRED QUALITY TERMS: Must include "HD", "4K", or "HD & 4K".
   - EXAMPLES OF DYNAMIC TITLES (Use as structural inspiration):
     "{$artistName} Clean Fanart Wallpapers 4K"
     "{$artistName} Aesthetic Pixiv Art HD"
     "{$artistName} High Res Illustrations And Backgrounds"
     "{$artistName} 4K Art Gallery For PC"
     "{$artistName} Twitter Fanart Backgrounds 4K"
     "{$artistName} Setup Wallpapers HD 4K"
   Generate exactly ONE title based on these constraints. Keep it under 60 characters.

4. seo_description (130-150 characters):
   Write a highly dynamic, anti-template meta description. It must sound like a real user dropping a link.
   CRITICAL RULES FOR DESCRIPTION:
   - NO AI OPENERS: Strictly forbid starting with "Looking for...?", "Need a...?", "Discover", or "Explore".
   - RANDOMIZE THE VIBE: Mentally pick ONE of these human angles to start, but vary the wording:
     * Angle A (The Hoarder): "Sharing my stash of {$artistName} fanart and backgrounds..."
     * Angle B (The Curator): "Finally compiled a clean folder of illustrations drawn by {$artistName}..."
     * Angle C (The Fan): "Some really good {$artistName} art I found for desktop and mobile..."
   - NO SALESMAN CTA: Do not end with "Download today!" or "Click here". Use passive closures like "feel free to save", "grab what you need", or let it end naturally.

5. atomic_answer (40-60 words):
   Highly factual Entity-Relationship statement for AI Overviews (AEO). 
   - Format: "{$artistName} is an illustrator recognized for [Art Style/Technique from step 1]. This hub page serves as an archive providing a gallery of high-resolution desktop and mobile wallpapers featuring their original artwork and fanart."

6. description (150-200 words):
   Write TWO highly engaging, dynamic paragraphs. You MUST randomize your narrative approach.
   - Paragraph 1 (The Art Appreciation Hook): Give massive credit to {$artistName}. Mentally roll a dice and pick ONE angle:
     * Angle 1 (Color & Light): Focus heavily on how they use lighting, shading, or color palettes to make their illustrations pop.
     * Angle 2 (Composition & Detail): Geek out over their line work, character anatomy, or how detailed their backgrounds are.
     * Angle 3 (The Vibe): Talk about the overall mood of their art (e.g., cozy, dynamic, gritty) and why it perfectly fits a monitor screen.
   
   - Paragraph 2 (The Wallpaper Offer): Transition to the gallery. DO NOT use the same transition every time. Tell them you've put together a collection of their work.
     * Vary your phrasing: "Scroll down to see the stash", "Grab a new background below", or "Here are some of the cleanest pieces from {$artistName}." Mention that using their art as a background is a great way to appreciate the details.

7. seo_keywords:
   Generate 12 intent-driven long-tail keywords. ALL LOWERCASE. Comma separated. Must include: "{$artistName} fanart", "{$artistName} wallpapers 4k", and "art drawn by {$artistName}".

8. schema_markup:
   Generate a valid JSON-LD structure for an "ImageGallery" wrapped in a "CollectionPage". 
   - Set "name" to your generated seo_title.
   - Set "description" to your generated seo_description.
   - Inside "about", create a "Person" entity with "name" set to "{$artistName}".

**CRITICAL: JSON OUTPUT SAFETY**
Return ONLY valid JSON wrapped in ```json:
{
  "_artist_analysis": "...",
  "slug": "...",
  "seo_title": "...",
  "seo_description": "...",
  "atomic_answer": "...",
  "description": "...",
  "seo_keywords": "...",
  "schema_markup": { ... }
}
EOT;

    return response()->json([
        'success' => true,
        'prompt'  => trim($prompt)
    ]);
}
}