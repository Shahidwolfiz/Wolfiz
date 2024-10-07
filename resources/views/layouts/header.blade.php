<div class="header">
    <h2 class="title">Admin Panel</h2>
    <img src="{{ asset('images/logos.jpg') }}" alt="Logo" class="logo"> 
</div>
<style>
    .header {
    /* width: 100%; */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2px;
    background-color: #103B99; 
    color: white;
    position: relative; 
}

.logo {
    height: 80px; 
}

.title {
    font-size: 1.5rem;
    margin: 0;
}

.footer {
    position: fixed; 
    bottom: 0;
    left: 0;
    width: 100%;
    background: #263238;
    text-align: center;
    color: #f4f4f4; 
    padding: 10px 0; 
}

.icons {
    /* padding-top: 1rem; Space above the icons */
}

.icons a {
    text-decoration: none;
    font-size: 2rem; 
    margin: 0.5rem; 
    color: #f4f4f4; 
    transition: color 0.3s; 
}

.icons a:hover {
    color: #007bff;
}

.company-name {
    font-size: 1.6rem; 
    margin-top: 0.5rem; 
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .title {
        font-size: 1.2rem; 
    }

    .footer {
        font-size: 0.9rem; 
    }

    .icons a {
        font-size: 1.5rem; 
    }
}
</style>