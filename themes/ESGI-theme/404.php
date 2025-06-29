<?php get_header(); ?>

<style>
   .error-content {
      background: white;
      border-radius: 12px;
      padding: 3rem 2rem;
      text-align: center;
   }

   .error-number {
      font-size: 4rem;
      font-weight: 700;
      color: #6c757d;
      margin: 0 0 1rem 0;
   }

   .error-title {
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: #343a40;
      font-weight: 600;
   }

   .error-description {
      color: #6c757d;
      margin-bottom: 2rem;
      font-size: 1.1rem;
   }

   .search-form {
      margin-bottom: 2rem;
   }

   .search-form input[type="search"] {
      padding: 0.75rem 1rem;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      font-size: 1rem;
      width: 100%;
      max-width: 300px;
      transition: border-color 0.3s ease;
   }

   .search-form input[type="search"]:focus {
      outline: none;
      border-color: #007bff;
   }

   .search-form button {
      background: #007bff;
      border: none;
      padding: 0.75rem 1.5rem;
      color: white;
      border-radius: 8px;
      margin-left: 0.5rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
   }

   .search-form button:hover {
      background: #0056b3;
   }
</style>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
         <div class="error-content">
            <h1 class="error-number">404</h1>
            <h2 class="error-title">Page introuvable</h2>
            <p class="error-description">
               Esayez de faire une recherche
            </p>

            <div class="search-form">
               <?php get_search_form(); ?>
            </div>

            <a href="<?php echo home_url(); ?>">
               Retour à l'accueil
            </a>
         </div>
      </div>
   </div>
</div>


<?php get_footer(); ?>