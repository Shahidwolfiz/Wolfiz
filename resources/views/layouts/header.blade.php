<div class="header">
    <h2 class="title">Admin Panel</h2>
    <img src="{{ asset('images/logos.jpg') }}" alt="Logo" class="logo"> <!-- Update path to your logo -->
</div>
<style>
    .header {
    /* width: 100%; */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #103B99; /* Header background color */
    color: white;
    position: relative; /* Adjusted for better stacking context */
}

.logo {
    height: 80px; /* Logo height */
}

.title {
    font-size: 1.5rem;
    margin: 0;
}

.footer {
    position: fixed; /* Keeps the footer at the bottom of the viewport */
    bottom: 0;
    left: 0;
    width: 100%;
    background: #263238; /* Footer background color */
    text-align: center;
    color: #f4f4f4; /* Footer text color */
    padding: 10px 0; /* Padding for spacing */
}

.icons {
    padding-top: 1rem; /* Space above the icons */
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