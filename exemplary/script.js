let menu = document.querySelector('#menu-btn');
let header = document.querySelector('.header');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    header.classList.toggle('active');
    document.body.classList.toggle('active');
}

window.onscroll = () =>{
    if(window.innerWidth < 991){
        menu.classList.remove('fa-times');
        header.classList.remove('active');
        document.body.classList.remove('active');
    }

    document.querySelectorAll('section').forEach(sec =>{

        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            document.querySelectorAll('.header .navbar a').forEach(links =>{
                links.classList.remove('active');
                document.querySelector('.header .navbar a[href*='+ id +']').classList.add('active')
            });
        };


    });

}


document.getElementById("createFormButton").addEventListener("click", function() {
    //
    const services = [
        { id: 1, name: "Web Development" },
        { id: 2, name: "Graphic Design" },
        { id: 3, name: "Digital Marketing" },
        { id: 4, name: "Bootstrap" },
        { id: 5, name: "Wordpress" },
    ];

    createForm(services);
});

function createForm(services) {
    const formContainer = document.getElementById("formContainer");
    formContainer.innerHTML = ''; // Clear the container

    const form = document.createElement("form");
    form.id = "serviceForm";

    services.forEach(service => {
        // Create a field for each service
        const serviceDiv = document.createElement("div");

        const label = document.createElement("label");
        label.setAttribute("for", service.id);
        label.textContent = service.name;  // Assuming each service has an id and name

        const input = document.createElement("input");
        input.type = "text";
        input.id = 'service-${service.id}';
        input.name = 'service-${service.id}'.name;  // Assuming name is the field for service

        serviceDiv.appendChild(label);
        serviceDiv.appendChild(input);
        form.appendChild(serviceDiv);
    });

    // Create a submit button
    const submitButton = document.createElement("button");
    submitButton.type = "submit";
    submitButton.textContent = "Submit";
    form.appendChild(submitButton);

    formContainer.appendChild(form);

    // Handle form submission (AJAX or regular form submission)
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        // Send form data to your server for processing
        fetch('/submitServiceForm', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Form successfully submitted:', data);
        })
        .catch(error => {
            console.error('Error submitting form:', error);
        });
    });
}

