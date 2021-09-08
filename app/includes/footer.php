
<footer>
    
    <section class="footer-info">

        <div class="about">
            <div class="foot-logo">
                <h1>CHI<span class="log">QUIRE</span></h1> 
            </div>
            <p></p>
            <p><i class="far fa-envelope"></i>&nbsp; chiquireblog@gmail.com</p>
            <p><i class="fas fa-phone-alt"></i>&nbsp; +<span>234</span> 810 254 5277</p>

            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
            <li><a href="#"><span class="fab fa-youtube"></span></a></li>

        </div>

        <div class="links">
            <h2>Quick Links</h2>

            <li><a href="about.php">About Us</a></li>
            <!-- <li><a href="#">Services</a></li> -->
            <li><a href=<?php echo BASE_URL . "/authorizations/mail.php"?>>Become a writer</a></li>
            <li><a href="<?php echo BASE_URL . "/assets/DISCLAIMER.pdf"?>">Disclaimer</a></li>
            <li><a href="<?php echo BASE_URL . "/assets/policies.pdf"?>">Privacy Policies</a></li>
        </div>

        <div class="contact-us">
            <h2>Contact Us</h2>

            <form action="index.php" method="post">
                <input type="text" class="text-input" placeholder="Your email address">
                <textarea name="message" rows="4" class="text-input" placeholder="Your message..."></textarea>
                <input type="submit" class="btn">
            </form>
        </div>

    </section>

    <section class="copyright">
        <p>&copy;2020 Chi<span class="log">quire</span>.com | Designed by Eli Creations & Bez Tex</p>
    </section>

</footer>