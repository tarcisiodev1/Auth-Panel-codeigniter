 // Remover a flashData 'notification' após 5 segundos
 setTimeout(function() {
    var notification = document.getElementById('notification');
    if (notification) {
        notification.remove();
    }
}, 5000);