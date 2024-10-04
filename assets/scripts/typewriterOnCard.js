document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('typewriter-text');
    const firstName = element.getAttribute('data-firstname');
    const text = `Désolé ${firstName}, vous n'avez pas de carnet...`;
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            element.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, 50); // Ajustez la vitesse ici (50ms par caractère)
        }
    }

    typeWriter();
});
