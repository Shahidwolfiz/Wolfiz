<footer class="footer">
    <div class="icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <p class="company-name">
            Wolfiz &copy; 2024, ALL Rights Reserved
        </p>
    </div>
</footer>
<style>
    .header {
    /* width: 97.6%; */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2px;
    background-color: #103B99; 
    position: relative; 
}

.logo {
    height: 80px; /* Logo height */
}

.title {
    font-size: 1.5rem;
    margin: 0;
}

.footer {
    height: 10%;
    position: fixed; /* Keeps the footer at the bottom of the viewport */
    bottom: 0;
    left: 0;
    width: 100%;
    background: #263238; /* Footer background color */
    text-align: center;
    color: #f4f4f4; /* Footer text color */
    /* padding: 10px 0; Padding for spacing */
}

.icons {
    /* padding-top: 1rem; Space above the icons */
}

.icons a {
    text-decoration: none;
    font-size: 2rem; /* Icon size */
    margin: 0.5rem; /* Space between icons */
    color: #f4f4f4; /* Icon color */
    transition: color 0.3s; /* Smooth color transition */
}

.icons a:hover {
    color: #007bff; /* Color on hover */
}

.company-name {
    font-size: 1.6rem; /* Company name size */
    margin-top: 0.5rem; /* Space above the company name */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .title {
        font-size: 1.2rem; /* Smaller title on mobile */
    }
    .footer {
        font-size: 0.9rem; /* Smaller footer text on mobile */
    }

    .icons a {
        font-size: 1.5rem; /* Smaller icon size on mobile */
    }
}
</style>