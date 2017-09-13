// Register Service Worker

if('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/service_worker.js').then(function(registration) {
    // Registration was successful
     alert();
  }).catch(function(err) {
    // registration failed :(
   
    console.log('ServiceWorker registration failed: ', err);
  });
}

// Setup Push notifications

//var pushButton = document.querySelector('.col-xs-4 how_it_box');
//pushButton.addEventListener('click', subscribe);

function subscribe() {
  // Disable the button so it can't be changed while  
  // we process the permission request  
  pushButton.disabled = true;

  navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
    serviceWorkerRegistration.pushManager.subscribe({ userVisibleOnly: true })
      .then(function(subscription) {
        // The subscription was successful  
        isPushEnabled = true;
        pushButton.textContent = 'Disable Push Messages';
        pushButton.disabled = false;

        // TODO: Send the subscription.endpoint to your server  
        // and save it to send a push message at a later date
        // return sendSubscriptionToServer(subscription);
      })
      .catch(function(e) {
        if(Notification.permission === 'denied') {
          // The user denied the notification permission which  
          // means we failed to subscribe and the user will need  
          // to manually change the notification permission to  
          // subscribe to push messages  
          console.warn('Permission for Notifications was denied');
          pushButton.disabled = true;
        } else {
          // A problem occurred with the subscription; common reasons  
          // include network errors, and lacking gcm_sender_id and/or  
          // gcm_user_visible_only in the manifest.  
          console.error('Unable to subscribe to push.', e);
          pushButton.disabled = false;
          pushButton.textContent = 'Enable Push Messages';
        }
      });
  });
}