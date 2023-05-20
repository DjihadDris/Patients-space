var content = new Vue({
el: '#content',
data: {
title: 'Connectez-vous à votre compte'
}
});
var register = new Vue({
el: '#register',
data: {
title: "Vous n'avez pas de compte",
link: "S'inscrire"
}
});
var button = new Vue({
el: '#btn',
data: {
btn: 'Connexion'
}
});
var password = new Vue({
el: '#password',
data: {
password: 'Récupération de mot de passe'
}
});