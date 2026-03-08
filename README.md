# Enhancing Brain WordPress Theme

**Version:** 1.0.0  
**Requires WordPress:** 6.0+  
**Requires PHP:** 8.0+

## Installing the Theme

1. Go to **Appearance → Themes → Add New → Upload Theme**
2. Upload `enhancingbrain-theme.zip`
3. Click **Activate**

## First-Time Setup

1. **Settings → Reading** → Set "Your homepage displays" to "A static page" → Homepage: **Home**
2. **Appearance → Menus** → Create a menu, add pages, assign to "Primary Navigation"
3. **Appearance → Customize → ⚡ Enhancing Brain** → Edit all content, colours, and text

## Using [eb_highlight]

To get the green italic Playfair Display accent on any text:

**In Customizer fields:**
```
Your brain is your [eb_highlight]highest-ROI asset.[/eb_highlight]
```

**In the block editor:**  
Select text → click the ⭐ EB Highlight button in the toolbar.

**In page/post content:**
```
[eb_highlight]text here[/eb_highlight]
```

## Adding New Pages

Pages do NOT require re-uploading the theme.

1. **Pages → Add New**
2. Write content in the block editor
3. Assign a **Page Template** from the sidebar (right panel → Page Attributes → Template)
4. Publish

Available templates:
- **Default Page** — Clean centred layout for About, Privacy Policy etc.
- **Full Width** — No sidebar, max content width (coming in v1.1)

## Updating the Theme

1. Make changes to theme files
2. Re-zip the folder as `enhancingbrain-theme.zip`
3. **Appearance → Themes → Add New → Upload Theme** → check "Replace current"
4. All your posts, pages, and Customizer settings are **never affected** by theme updates.

## Categories Setup

Create these categories in **Posts → Categories**:
- Brain Health & Longevity (slug: `brain-health-longevity`)
- Focus & Productivity (slug: `focus-productivity`)
- Memory & Learning (slug: `memory-learning`)
- Nootropics & Supplements (slug: `nootropics-supplements`)

Add a **Description** to each category — it shows on the archive page under the category name.

## File Structure

```
enhancingbrain-theme/
├── style.css               ← Theme header (required by WP)
├── functions.php           ← Setup, enqueue, shortcodes, helpers
├── header.php
├── footer.php
├── index.php               ← Required fallback
├── front-page.php          ← Homepage
├── single.php              ← Single post
├── archive.php             ← Category/tag/date archives
├── page.php                ← Default page template
├── inc/
│   └── customizer.php      ← Full Customizer with live preview
└── assets/
    ├── css/
    │   ├── main.css         ← All front-end styles
    │   └── editor-style.css ← Block editor styles
    └── js/
        ├── main.js              ← Front-end JS
        ├── customizer-preview.js ← Live preview (postMessage)
        └── editor-formats.js    ← EB Highlight toolbar button
```
