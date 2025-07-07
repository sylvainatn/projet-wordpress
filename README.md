# 🎨 Thème ESGI - WordPress

> **Thème WordPress moderne avec menu mobile responsive, workflow SCSS et sections modulaires**

[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://php.net/)
[![Node.js](https://img.shields.io/badge/Node.js-16%2B-green.svg)](https://nodejs.org/)
[![SCSS](https://img.shields.io/badge/SCSS-Sass-ff69b4.svg)](https://sass-lang.com/)

## 🚀 Démarrage Rapide

```bash
# Installation
cd themes/ESGI-theme
npm install

# Développement
npm run watch

# Production
npm run build
```

**📖 [Guide de Démarrage Rapide](DEMARRAGE-RAPIDE.md)**

## ✨ Fonctionnalités

### 📱 Menu Mobile Responsive
- Menu burger avec animation fluide
- Gestion WordPress native (Apparence > Menus)
- Fermeture automatique (clic extérieur, Échap, scroll)
- Logo blanc adapté au menu mobile

### 🎨 Customizer WordPress
- **Hero Section** : Titre et image personnalisables
- **About Us** : 3 sous-sections modulaires
- **Services** : 4 images de services
- **Partners** : 6 logos en grille responsive
- **Réglages** : Couleurs, réseaux sociaux, options

### 🔧 Workflow SCSS Moderne
- Compilation automatique avec `npm run watch`
- Structure modulaire (partials, components, vendor)
- Source maps pour le débogage
- Build optimisé pour la production

### 📐 Design Responsive
- Mobile First
- Bootstrap Grid intégré
- Breakpoints : 768px, 992px, 1200px
- Images adaptatives

## 📁 Structure du Projet

```
ESGI-theme/
├── 📄 Documentation/
│   ├── GUIDE-UTILISATION.md
│   ├── DOCUMENTATION-TECHNIQUE.md
│   ├── README-SCSS.md
│   ├── TESTS-VALIDATION.md
│   └── CHANGELOG.md
├── 🎨 Styles/
│   └── src/css/
│       ├── style.scss
│       ├── partials/
│       ├── components/
│       └── vendor/
├── 🧩 Templates/
│   ├── header.php
│   ├── front-page.php
│   └── template-parts/
├── ⚙️ Configuration/
│   ├── functions.php
│   ├── package.json
│   └── js/menu.js
└── 🎯 Assets/
    └── src/images/
```

## 🎯 Utilisation

### 1. Activation
1. Activer le thème dans **Apparence > Thèmes**
2. Configurer le menu mobile dans **Apparence > Menus**
3. Personnaliser les sections dans **Apparence > Personnaliser**

### 2. Menu Mobile
- Créer un menu et l'assigner à **"Mobile Dropdown Menu"**
- Le menu s'ouvre via l'icône ☰ en haut à droite
- Fermeture automatique et navigation par ancres

### 3. Customizer
- **Réglages ESGI** : Couleur principale, mode sombre
- **Hero Section** : Titre et image d'accueil
- **About Us** : Description complète avec sous-sections
- **Services** : 4 images de services
- **Partners** : 6 logos partenaires

## 🔧 Développement

### Scripts npm
```bash
npm run watch      # Développement avec surveillance
npm run build      # Production (minifié)
npm run build:dev  # Développement (non minifié)
```

### Personnalisation
```scss
// src/css/partials/_colors.scss
$primary-color: #050A3A;
$secondary-color: #f8f9fa;
$accent-color: #3f51b5;
```

### Ajout de fonctionnalités
1. **Template-parts** : Créer dans `template-parts/`
2. **Styles** : Ajouter dans `src/css/components/`
3. **Customizer** : Étendre dans `functions.php`

## 📖 Documentation

| Document | Description |
|----------|-------------|
| **[Guide d'Utilisation](GUIDE-UTILISATION.md)** | Pour les utilisateurs finaux |
| **[Documentation Technique](DOCUMENTATION-TECHNIQUE.md)** | Pour les développeurs |
| **[Workflow SCSS](README-SCSS.md)** | Configuration SCSS |
| **[Tests & Validation](TESTS-VALIDATION.md)** | Checklist de validation |
| **[Changelog](CHANGELOG.md)** | Historique des versions |

## 🎨 Captures d'Écran

### Desktop
- Header avec logo
- Sections Hero, About, Services, Partners
- Footer avec réseaux sociaux

### Mobile
- Menu burger responsive
- Sections adaptatives
- Logo blanc dans le menu mobile

## 🔧 Configuration Technique

### Prérequis
- **WordPress** : 5.0+
- **PHP** : 7.4+
- **Node.js** : 16+
- **npm** : 8+

### Dépendances
```json
{
  "devDependencies": {
    "sass": "^1.70.0"
  }
}
```

### Navigateurs supportés
- Chrome (2 dernières versions)
- Firefox (2 dernières versions)
- Safari (2 dernières versions)
- Edge (2 dernières versions)

## 🎯 Performance

### Optimisations
- ✅ CSS minifié en production
- ✅ Images responsives
- ✅ JavaScript minimal
- ✅ Source maps pour le débogage

### Métriques cibles
- **Performance** : > 90 (Lighthouse)
- **Accessibilité** : > 90
- **SEO** : > 90
- **Temps de chargement** : < 2s

## ♿ Accessibilité

- ✅ Navigation clavier complète
- ✅ Attributs alt sur les images
- ✅ Contraste des couleurs WCAG
- ✅ Structure HTML sémantique
- ✅ Focus visible

## 🔄 Versions

### Version 1.0.0 (Actuelle)
- Menu mobile responsive
- Customizer complet
- Workflow SCSS moderne
- Documentation complète

### Prochaines versions
- Sous-menus mobile
- Mode sombre complet
- Optimisations WebP
- Tests automatisés

## 🐛 Support

### Problèmes courants
- **Menu mobile** : Vérifier que `menu.js` est chargé
- **Styles** : Relancer `npm install` puis `npm run build`
- **Customizer** : Vérifier les permissions WordPress

### Débogage
```php
// wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

### Ressources
- [Documentation WordPress](https://developer.wordpress.org/)
- [Sass Documentation](https://sass-lang.com/documentation)
- [Bootstrap Grid](https://getbootstrap.com/docs/5.3/layout/grid/)

## 📞 Contact

Pour toute question ou problème :
1. Consulter la [documentation](GUIDE-UTILISATION.md)
2. Vérifier les [tests de validation](TESTS-VALIDATION.md)
3. Consulter le [changelog](CHANGELOG.md)

## 📄 Licence

Ce thème est développé pour un usage éducatif dans le cadre du projet ESGI.

---

**🎯 Développé avec les meilleures pratiques WordPress et les standards du web moderne.**

**✨ Prêt pour la production !**
