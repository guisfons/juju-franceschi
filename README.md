# Juliana Franceschi — Case Study

> **Custom WordPress Theme** · Personal Brand & Portfolio Site · PHP 8 · ACF-Managed Content

![WordPress](https://img.shields.io/badge/WordPress-6.0+-21759B?logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?logo=php&logoColor=white)
![ACF Pro](https://img.shields.io/badge/ACF-Pro-00A0D2)
![Live](https://img.shields.io/badge/Live-julianafranceschi.com.br-brightgreen)

<!-- TODO: Add screenshot of the Juliana Franceschi homepage here -->

---

## 1. Project Overview

A fully custom WordPress theme designed and developed for Juliana Franceschi, a Brazilian content creator and personal brand. The theme delivers a polished, editorial-quality web presence at [julianafranceschi.com.br](http://www.julianafranceschi.com.br/), with all content surfaces managed through Advanced Custom Fields Pro — enabling the client to maintain their portfolio, blog, and brand presence without technical assistance.

<!-- TODO: Add screenshot of the blog archive or portfolio section here -->

---

## 2. The Problem

Personal brand websites for content creators present a specific design challenge: the site must be visually distinctive and aligned with the creator's aesthetic identity, while remaining independently manageable by someone without development skills. Generic themes impose visual constraints that dilute the brand; page builders introduce performance overhead and vendor lock-in. The client needed a purpose-built solution that would look and function exactly as designed, with an editing experience simple enough for daily use.

---

## 3. The Solution & Architecture

The theme was built as a lean, purpose-specific WordPress theme with ACF Pro field groups defining every editable content region. The architecture prioritises performance — no page builder runtime, no unnecessary plugin dependencies — with a clean separation between the PHP template layer and the content data stored in WordPress post meta.

### Key Technical Decisions

- **ACF field groups** registered programmatically for each content section (hero, about, featured content, contact), ensuring the admin interface is tailored to the client's actual content model rather than exposing generic WordPress fields.
- **Modular template structure** using `get_template_part()` for reusable components (header variants, content cards, footer), enabling efficient maintenance and future extension.
- **Custom page templates** for the portfolio archive, individual post layouts, and the homepage — each optimised for its specific content type rather than relying on a single generic template.
- **Performance-first asset loading** — styles and scripts are enqueued conditionally based on the template being rendered, avoiding unnecessary resource loading on pages where those assets are not required.

---

## 4. Technologies Used

- **CMS & Backend:** WordPress 6.0+, PHP 8.0+
- **Content Management:** ACF Pro — programmatic field group definitions
- **Styling:** Custom CSS with a mobile-first responsive approach
- **Live Site:** [julianafranceschi.com.br](http://www.julianafranceschi.com.br/)

---

## 5. Design Process & UI/UX

The design language is warm, personal, and editorial — reflecting the client's content niche and target audience. Typography takes centre stage, with carefully selected font pairings that balance readability with personality. The colour palette is deliberately restrained, allowing the client's photography and content to dominate the visual hierarchy.

The admin editing experience was designed to match the client's mental model of their own content: sections are labelled with plain-language descriptions, all field groups are contextually placed on the relevant post type or page, and no extraneous WordPress fields are visible in the admin interface.

<!-- TODO: Add screenshot of the ACF admin interface for the homepage sections here -->
<!-- TODO: Add screenshot of a single blog post template here -->

---

## 6. Project Outcomes

- **Brand alignment:** The custom theme delivers a fully brand-aligned digital presence that accurately reflects the client's identity — not achievable with template themes.
- **Client autonomy:** The ACF-powered admin interface allows the client to manage all content independently, including the homepage hero, portfolio entries, and blog posts.
- **Performance:** No page builder overhead results in a clean, fast-loading site with minimal render-blocking resources, supporting strong Core Web Vitals performance.
- **Long-term maintainability:** The theme's clean PHP architecture and programmatic ACF configuration make it straightforward for any WordPress developer to maintain or extend.
