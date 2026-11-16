# Minty — Système de Design & Maquettes Stitch

Ce document regroupe les spécifications du système de design officiel de **Minty**, extrait directement du projet Google Stitch (*Minty Tracker Design System*).

---

## 1. Identité Visuelle Principale : *Mint Holographic Vault*

Le design combine la rigueur analytique de la gestion de patrimoine financier avec l'aspect tactile et irisé des cartes de collection rares sous scellé (Pokémon, Star Wars: Unlimited, Magic, One Piece, Lorcana).

- **Mouvement :** High-Precision Modernism & Prismatic Glassmorphism.
- **Atmosphère :** Nocturne (Obsidian Void `#090D0E` et `#0F172A`), relevée par la signature lumineuse **Vert Menthe du Logo** (Menthe Profonde `#0D9488` & Menthe Givrée `#5EEAD4`).
- **Typographie :** **Space Grotesk** (titres, statistiques numériques, cotations) + **Manrope** (textes, descriptions, listes).

---

## 2. Palette de Couleurs Principale (Directement extraite du Logo Minty)

| Rôle | Token | Couleur Hex | Usage |
| :--- | :--- | :--- | :--- |
| **Primaire Menthe** | `primary` | `#0D9488` | Actions principales, boutons CTA, liens actifs, barre de navigation |
| **Menthe Lumineuse** | `primary-fixed` | `#5EEAD4` | Accents lumineux, liserés, badges 100% complétion, survol |
| **Menthe Hover** | `primary-hover` | `#0F766E` | État au survol des boutons et éléments interactifs |
| **Menthe Fond Léger** | `surface-mint` | `#F0FDFA` / `#CCFBF1` | Arrière-plans subtils, conteneurs doux |
| **Secondaire Cyan** | `secondary` | `#2DD4BF` / `#00D9F5` | Codes d'extensions, bannières de sets, métriques secondaires |
| **Fond Void** | `surface` / `background` | `#0F172A` / `#101415` | Fond général sombre haute lisibilité (ardoise titane du logo) |
| **Surface Base** | `surface-container` | `#131C20` / `#1C2021` | Tuiles des cartes, cellules de classeur |
| **Surface Élevée** | `surface-container-high`| `#18242A` / `#272B2C` | Modales, barres de recherche, tiroirs |
| **Glassmorphism** | `surface-glass` | `rgba(18, 26, 30, 0.72)` | Barre de navigation avec flou `backdrop-filter: blur(16px)` |

### Tiers de Gradation & État des Cartes

- **NM (Near Mint) :** Texte `#0D9488` sur fond `rgba(94, 234, 212, 0.15)`
- **EX (Excellent) :** Texte `#38BDF8` sur fond `rgba(56, 189, 248, 0.12)`
- **GD (Good) :** Texte `#FBBF24` sur fond `rgba(251, 191, 36, 0.12)`
- **LP (Light Played) :** Texte `#F87171` sur fond `rgba(248, 113, 113, 0.12)`

### Tokens de Rareté

- **Commune :** `#94A3B8`
- **Peu Commune :** `#38BDF8`
- **Rare :** `#F59E0B`
- **Légendaire / Secret Rare :** Dégradé holographique `linear-gradient(135deg, #5EEAD4 0%, #0D9488 35%, #9B51E0 75%, #F72585 100%)`

---

## 3. Typographie

- **Space Grotesk** (Headlines & Données) :
  - `display-hero` : 40px (700 bold, line-height 48px, letter-spacing -0.03em)
  - `headline-md` : 24px (600 semi-bold, line-height 32px)
  - `stat-num` : 28px (700 bold, line-height 34px)
  - `label-caps` : 11px (700 bold, tracking 0.08em uppercase)
- **Manrope** (Corps & Interface) :
  - `body-base` : 15px (400 regular, line-height 24px)
  - `title-card` : 16px (600 semi-bold)
  - `body-sm` : 13px (400 regular)

---

## 4. Systèmes de Design Alternatifs Inclus

En plus de la charte *Mint Holographic Vault*, le projet Stitch comprend trois déclinaisons exploratoires :
1. **Monochrome Éditorial / Swiss Archive :** Fond clair `#FFFFFF` / `#F8F9FB`, noir d'encre `#111827`, accent carmin `#BB0112`, typographie Space Grotesk + Inter + JetBrains Mono.
2. **Kyber Nebula :** Nuances cosmiques violettes `#6D28D9`, améthyste et lilas `#F9F8FD`.
3. **Galactic Archival :** Bleu indigo profond `#312E81`, cobalt `#2563EB` et ambre `#F59E0B`.

---

## 5. Intégration dans le Projet Minty

Les maquettes complètes sont disponibles au format HTML interactif (avec Tailwind CSS et polices Google Fonts embarquées) ainsi qu'en captures d'écran haute résolution dans les dossiers :
- `mockups/screens/desktop/` : Vues ordinateurs (Dashboard, Checklist, Compte, etc.)
- `mockups/screens/mobile/` : Vues smartphones (Dashboard, Fiche Carte, Scanner IA, Collections)
- `mockups/logos/` : Déclinaisons des logos en SVG vectoriel
- `mockups/index.html` : Galerie visuelle locale pour tout consulter en un clic
