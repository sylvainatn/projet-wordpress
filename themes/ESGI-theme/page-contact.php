<?php get_header(); ?>

<div class="contact-page">
    <h1 class="contact-title">Contacts.</h1>
    <p class="contact-desc">
        A desire for a big big party or a very select congress? Contact us.
    </p>
    
    <div class="contact-infos">
        <div class="contact-block">
            <strong>Location</strong>
            <span>24 Rue du Faubourg Saint-Antoine<br>75012 Paris FRANCE</span>
        </div>
        <div class="contact-block">
            <strong>Manager</strong>
            <span>+33 1 53 31 25 23</span>
            <span>info@esgi.com</span>
        </div>
        <div class="contact-block">
            <strong>CEO</strong>
            <span>+33 1 53 31 25 25</span>
            <span>ceo@company.com</span>
        </div>
    </div>

    <div class="contact-image">
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/png/10.png" alt="Contact ESGI">
    </div>

    <div class="contact-form-section">
        <h2>Write us here</h2>
        <p>Go! Don't be shy.</p>
        <form class="contact-form">
            <input type="text" name="subject" placeholder="Subject">
            <div class="form-row">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone no.">
            </div>
            <textarea name="message" placeholder="Message"></textarea>
            <button type="submit" class="submit-btn-minimal">Submit</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>