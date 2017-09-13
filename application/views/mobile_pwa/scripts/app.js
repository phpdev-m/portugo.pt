(function() {
  'use strict';

  var app = {
    isLoading: true,
    visibleLocal: {},
    selectedEndereco: [],
    spinner: document.querySelector('.loader'),
    enderecoTemplate: document.querySelector('.enderecoTemplate'),
    container: document.querySelector('.main'),
    addDialog: document.querySelector('.dialog-container')
  };



  /*****************************************************************************
   *
   * Event listeners for UI elements
   *
   ****************************************************************************/

  document.getElementById('butRefresh').addEventListener('click', function() {
   // Refresh all of the data
    app.updateEndereco();
  }); 


    document.getElementById('butAdd').addEventListener('click', function() {
   // Carrega enderecos para selecao  dialog
    app.toggleAddDialog(true);
     });



    document.getElementById('butAddEndereco').addEventListener('click', function() {
    // Add os enderecos  selecionado 
    var select = document.getElementById('selectEnderecoToAdd');
    var selected = select.options[select.selectedIndex];
    var place_id = selected.value;
    var label = selected.textContent;
    if (!app.selectedEndereco) {
      app.selectedEndereco = [];
    }
    app.getEndereco(place_id, label);
    app.selectedEndereco.push({place_id: place_id, label: label});
    app.saveSelectedEndereco();
    app.toggleAddDialog(false);
     });


     document.getElementById('butAddCancel').addEventListener('click', function() {
       // Close dialog  addres
      app.toggleAddDialog(false);
     });


/*****************************************************************************
   *
   * Methods to update/refresh the UI
   *
   ****************************************************************************/
  // Toggles the visibility of the add new local  dialog.
  app.toggleAddDialog = function(visible) {
    if (visible) {
      app.addDialog.classList.add('dialog-container--visible');
    } else {
      app.addDialog.classList.remove('dialog-container--visible');
    }
  };

  // Updates a data adresss with the latest address. If the address
  // doesn't already exist, it's cloned from the template.
  app.updateEnderecoLocal = function(data) {
    var dataLastUpdated = new Date(data.created);
    var place_id = data.endereco.place_id;
    var cep = data.endereco.cep;
    var endereco = data.endereco.endereco;
    var cidade = data.endereco.cidade;

    var local = app.visibleLocal[data.place_id];
    if (!local) {
      local = app.enderecoTemplate.cloneNode(true);
      local.classList.remove('enderecoTemplate');
      local.querySelector('.location').textContent = data.label;
      local.removeAttribute('hidden');
      local.container.appendChild(local);
      local.visibleLocal[data.key] = local;
    }

    // Verifies the data provide is newer than what's already visible
    // on the local, if it's not bail, if it is, continue and update the
    // time saved in the local
    var localLastUpdatedElem = local.querySelector('.local-last-updated');
    var localLastUpdated = localLastUpdatedElem.textContent;
    if (localLastUpdated) {
      localLastUpdated = new Date(localLastUpdated);
      // Bail if the local has more recent data then the data
      if (dataLastUpdated.getTime() < localLastUpdated.getTime()) {
        return;
      }
    }

    localLastUpdatedElem.textContent = data.created;

    local.querySelector('.description').textContent = current.text;
    local.querySelector('.date').textContent = current.date;
    local.querySelector('.current .icon').classList.add(app.getIconClass(current.code));
    local.querySelector('.current .place_id .value').textContent = 
       Math.round(current.place_id);
    card.querySelector('.current .cep').textContent = cep;
    card.querySelector('.current .endereco').textContent = endereco;
    card.querySelector('.current .cidade.value').textContent = cidade;

    if (app.isLoading) {
      app.spinner.setAttribute('hidden', true);
      app.container.removeAttribute('hidden');
      app.isLoading = false;
    }
  };






  /*****************************************************************************
   *
   * Methods for dealing with the model
   *
   ****************************************************************************/

  /*
   * Gets a address for a specific cityl and updates the  local  with the data.
   * getEndereco() first checks if the local data is in the cache. If so,
   * then it gets that data and populates the local with the cached data.
   * Then, getEndereco() goes to the network for fresh data. If the network
   * request goes through, then the local gets updated a second time with the
   * freshest data.
   */
  app.getEndereco = function(key, label) {
    var statement = 'select * from local.endereco where woeid=' + place_id;
    var url = 'https://query.yahooapis.com/v1/public/yql?format=json&q=' +
        statement;
    // TODO add cache logic here
    if ('caches' in window) {
      /*
       * Check if the service worker has already cached this address
       * data. If the service worker has the data, then display the cached
       * data while the app fetches the latest data.
       */
      caches.match(url).then(function(response) {
        if (response) {
          response.json().then(function updateFromCache(json) {
            var results = json.query.results;
            results.place_id = place_id;
            results.label = label;
            results.created = json.query.created;
            app.updateEnderecoLocal(results);
          });
        }
      });
    }



    // Fetch the latest data.
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState === XMLHttpRequest.DONE) {
        if (request.status === 200) {
          var response = JSON.parse(request.response);
          var results = response.query.results;
          results.key = key;
          results.label = label;
          results.created = response.query.created;
          app.updateEnderecoLocal(results);
        }
      } else {
        // Return the initial endereco  since no data is available.
        app.updateEnderecoLocal(initialEndereco);
      }
    };
    request.open('GET', url);
    request.send();
  };

  // Iterate all of the locals  and attempt to get the latest endereco  data
  app.updateEndereco = function() {
    var keys = Object.keys(app.visibleLocal);
    keys.forEach(function(key) {
      app.getEndereco(key);
    });
  };

  // TODO add saveSelectedLocal function here
  // Save list of local to localStorage.
  app.saveSelectedLocal = function() {
    var selectedLocal = JSON.stringify(app.selectedLocal);
    localStorage.selectedLocal = selectedLocal;
  };

  app.getIconClass = function(atividadeCode) {
    // Weather codes: https://developer.yahoo.com/weather/documentation.html#codes
    atividadeCode = parseInt(atividadeCode);
    switch (atividadeCode) {
      case 25: // Japoness
      case 32: // Italiano
      case 33: // Brasileiro
      case 34: // Portugues
      case 3200: // not available
        return 'Local';
      }
  };




/*
   * Fake address data that is presented when the user first uses the app,
   * or when the user has not saved any address .
   */
  var initialEndereco = {
    key: '2459115',
    created: '2016-07-22T01:00:00Z',
    label: 'Restaurante TopTop',
    code: 25,
    endereco: {
        cep: "24322360",
        endereco: "Rua Cel Joao Tomas",
        cidade: "Niteroi"  
      }
  };
  
  

  // TODO uncomment line below to test app with fake data
//  app.updateEnderecoLocal(initialEndereco);

  /************************************************************************
   *
   * Code required to start the app
   *
   * NOTE: To simplify this codelab, we've used localStorage.
   *   localStorage is a synchronous API and has serious performance
   *   implications. It should not be used in production applications!
   *   Instead, check out IDB (https://www.npmjs.com/package/idb) or
   *   SimpleDB (https://gist.github.com/inexorabletash/c8069c042b734519680c)
   ************************************************************************/

  // TODO add startup code here
  app.selectedLocal = localStorage.selectedLocal;
  if (app.selectedLocal) {
    app.selectedLocal = JSON.parse(app.selectedLocal);
    app.selectedLocal.forEach(function(local) {
      app.getForecast(local.place_id, local.label);
    });
  } 
  else {
    /* The user is using the app for the first time, or the user has not
     * saved any local, so show the user some fake data. A real app in this
     * scenario could guess the user's location via IP lookup and then inject
     * that data into the page.
     */
    app.updateEnderecoLocal(initialEndereco);
    app.selectedLocal = [
      {place_id: initialEndereco.place_id, label: initialEndereco.label}
    ];
    app.saveSelectedLocal();
  }


  // TODO add service worker code here
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
             .register('/application/views/mobile_pwa/service-worker.js')
             .then(function() { console.log('Service Worker Registered'); });
  }

})();


