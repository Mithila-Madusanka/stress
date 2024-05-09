<?$this->load->view("includes/header.php")?>
<head>
<link rel="icon" type="image/x-icon" href="favicon.ico">

<style>
    /* Basic styling */
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        
        
    }
    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        
    }
    h1 {
        color: #333;
    }
    
    /* Highlighted functions */
    .highlight {
        font-weight: bold;
        color: #007bff;
    }
    /* Service boxes */
    .services {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .service {
        flex: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-right: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .service:last-child {
        margin-right: 0;
    }
    .service img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .service:nth-child(1) {
        background-color: #ffcccc; /* Red */
    }
    .service:nth-child(2) {
        background-color: #ccffcc; /* Green */
    }
    .service:nth-child(3) {
        background-color: #ccccff; /* Blue */
    }



</style></head>

<body>

<div class="container">
    <h1>About Mind Cool</h1>
    <p > Welcome to Mind Cool, your go-to stress management solution.</p><br>
    
    <h2>Our Mission</h2>
    <p>Mind Cool aims to help individuals manage and reduce stress levels through effective techniques and support.</p><br>
    
    <h2>Our Services</h2>
    <div class="services">
        <div class="service">
            
            <h3 class="highlight">Guided Relaxation Sessions</h3>
            <p style="color:black;">Access a variety of guided relaxation sessions tailored to your needs, including meditation, breathing exercises, and mindfulness practices.</p>
        </div>
        <div class="service">
           
            <h3 class="highlight">Stress Tracking</h3>
            <p style="color:black;">Monitor your stress levels over time with our intuitive tracking tools. Identify triggers and patterns to better understand and manage your stress.</p>
        </div>
        <div class="service">
            
            <h3 class="highlight">Community Support</h3>
            <p style="color:black;">Connect with like-minded individuals in our supportive community. Share experiences, tips, and encouragement to help each other on the journey to stress management.</p>
        </div>
    </div><br>
    
    <h2>Our Team</h2>
    <p>Mind Cool is developed and maintained by a team of passionate individuals dedicated to improving mental well-being.</p>
    <p>Meet our team:</p>
    <ul>
        <li>K.K.Mithila Madusanka - Founder & CEO</li>
        <li>K.K.Mithila Madusanka- Head of Product Development</li>
        <li>K.K.Mithila Madusanka - QA engineer</li>
        <!-- Add more team members as needed -->
    </ul>
    
    <p>For any inquiries or feedback, feel free to <a href="contact.html">contact us</a>.</p>
</div>

<?$this->load->view("includes/footer.php")?>

</body>
</html>
