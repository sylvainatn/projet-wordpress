# SCSS Files - Thème ESGI

## Status Actuel
✅ **SCSS est maintenant configuré et fonctionnel !**

Les fichiers SCSS sont utilisés pour générer le CSS final. Le workflow de compilation est opérationnel.

## Architecture SCSS

### 📁 Structure des fichiers
```
src/css/
├── style.scss              # Point d'entrée principal
├── partials/                # Fichiers partiels (variables, mixins, etc.)
│   ├── _colors.scss        # Variables couleurs
│   ├── _fonts.scss         # Police Mulish + mixins
│   ├── _functions.scss     # Fonctions utilitaires
│   ├── _globals.scss       # Styles globaux
│   └── _post.scss          # Styles des articles
├── components/              # Composants modulaires
│   ├── _footer.scss        # Footer
│   ├── _header.scss        # Header
│   ├── _hero-section.scss  # Section Hero page d'accueil
│   ├── _identity-card.scss # Carte d'identité
│   └── _post-list.scss     # Liste des articles
└── vendor/                  # Librairies externes
    ├── bootstrap-grid.scss
    └── modern-normalize.scss
```

## 🛠️ Commandes disponibles

### Installation
```bash
npm install
```

### Compilation
```bash
# Compilation unique
npm run build

# Mode watch (recompilation automatique)
npm run dev
# ou
npm run watch
```

### Workflow recommandé

1. **Développement** : 
   - Lancer `npm run dev` pour la compilation automatique
   - Modifier les fichiers `.scss` (ne pas toucher `style.css`)
   
2. **Production** :
   - Lancer `npm run build` pour la version finale

## 📝 Modifications récentes

- ✅ Police Mulish intégrée dans `_fonts.scss`
- ✅ Mixins Mulish disponibles
- ✅ Variables de couleurs configurées
- ✅ Composant Hero Section ajouté
- ✅ Compilation automatique configurée

## 🎯 Prochaines étapes

- Développer les styles pour les sections Services et Partners
- Ajouter des variables pour les breakpoints responsive
- Créer des mixins pour les animations et transitions
