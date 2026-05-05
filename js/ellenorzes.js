document.getElementById('kapcsolat-form')?.addEventListener('submit', function(e) {
    let hibak = [];
    const nev = document.getElementById('nev').value.trim();
    const email = document.getElementById('email').value.trim();
    const uzenet = document.getElementById('uzenet').value.trim();
    const errorDiv = document.getElementById('js-errors');

    if (nev.length < 3) hibak.push("A név túl rövid!");
    if (!email.includes('@')) hibak.push("Érvénytelen e-mail cím!");
    if (uzenet.length < 10) hibak.push("Az üzenet legyen legalább 10 karakter!");

    if (hibak.length > 0) {
        e.preventDefault();
        errorDiv.innerHTML = hibak.join('<br>');
    }
});