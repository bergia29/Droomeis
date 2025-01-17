/***********************
 * connexion....
 ***********************/
function loadContacts() {
  fetch('load_contacts.php')
    .then(response => response.json())
    .then(contacts => {
      const contactList = document.getElementById('contactList');
      contactList.innerHTML = '';

      if (contacts.length === 0) {
        contactList.innerHTML = "<p style='text-align: center; color: gray;'>Aucun contact。</p>";
        return;
      }

      contacts.forEach(contact => {
        const contactItem = `
          <div class="contact-item" onclick="openChat(${contact.ID}, '${contact.Name}')">
            <div class="contact-info">
              <h3 class="contact-name">${contact.Name}</h3>
              <p>${contact.LastMessage || 'Aucune nouvelle'}</p>
            </div>
            <div class="status" style="color: ${contact.Status === 'en ligne' ? 'green' : 'red'};">
              ${contact.Status}
            </div>
          </div>
        `;
        contactList.innerHTML += contactItem;
      });
    })
    .catch(error => console.error('Erreur lors du chargement des contacts:', error));
}

/***********************
 * choisir un contact
 ***********************/
function filterContacts() {
  const searchQuery = document.querySelector('.search-input').value.toLowerCase();
  const contactItems = document.querySelectorAll('.contact-item');

  contactItems.forEach(item => {
    const contactName = item.querySelector('.contact-name').innerText.toLowerCase();
    item.style.display = contactName.includes(searchQuery) ? 'flex' : 'none';
  });
}

/***********************
 * open chat
 ***********************/
function openChat(contactID, contactName) {
  localStorage.setItem('chatContactID', contactID);
  localStorage.setItem('chatContactName', contactName);

  const isOnline = Math.random() > 0.5 ? 'en ligne' : 'hors connexion';
  localStorage.setItem('chatStatus', isOnline);

  window.location.href = 'chat.html';
}

/***********************
 *historique
 ***********************/
function loadChat() {
  const contactID = localStorage.getItem('chatContactID');
  const contactName = localStorage.getItem('chatContactName');
  const chatStatus = localStorage.getItem('chatStatus') || 'hors connexion';

  if (!contactID || !contactName) {
    alert("Aucun utilisateur sélectionné !");
    window.location.href = 'messagerie.html';
    return;
  }

  document.getElementById('chat-title').innerText = `Zone de Chat - ${contactName}`;
  document.getElementById('recipient-name').innerText = `Nom: ${contactName}`;
  document.getElementById('chat-status').innerText = `Statut: ${chatStatus}`;
  document.getElementById('chat-status').style.color = chatStatus === 'en ligne' ? 'green' : 'red';

  fetch(`load_messages.php?contactID=${contactID}`)
    .then(response => response.json())
    .then(messages => {
      const chatBox = document.getElementById('chat-box');
      chatBox.innerHTML = '';

      if (!messages || messages.length === 0) {
        chatBox.innerHTML = "<p style='text-align: center; color: gray;'>Aucune conversation pour l'instant.</p>";
        return;
      }

      messages.forEach(message => {
        const side = message.SenderID == contactID ? 'left' : 'right';
        const messageHTML = `
          <div class="chat-message ${side}">
            <p class="message-text">${message.Text}</p>
            <span class="message-meta">${message.Timestamp}</span>
          </div>
        `;
        chatBox.innerHTML += messageHTML;
      });

      chatBox.scrollTop = chatBox.scrollHeight;
    })
    .catch(error => console.error('Erreur lors du chargement des messages:', error));
}

/***********************
 * envoyer message
 ***********************/
function sendMessage() {
  const contactID = localStorage.getItem('chatContactID');
  const messageInput = document.getElementById('message-input');
  const message = messageInput.value.trim();

  if (!contactID) {
    alert("Choisissez un contact！");
    return;
  }

  if (!message) {
    alert("Il est vide！");
    return;
  }

  fetch('send_message.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `contactID=${contactID}&message=${encodeURIComponent(message)}`
  })
    .then(response => response.text())
    .then(result => {
      console.log(result);
      const chatBox = document.getElementById('chat-box');

      const currentTime = new Date().toLocaleTimeString();
      const newMessage = `
        <div class="chat-message right">
          <p class="message-text">${message}</p>
          <span class="message-meta">${currentTime}</span>
        </div>
      `;
      chatBox.innerHTML += newMessage;
      chatBox.scrollTop = chatBox.scrollHeight;
      messageInput.value = '';
    })
    .catch(error => console.error('Erreur lors de l\'envoi du message:', error));
}

/***********************
 * vider
 ***********************/
function clearChatRecords(contactName) {
  localStorage.removeItem(`chat_${contactName}`);
  alert(`Les conversations avec ${contactName} ont été supprimées.`);
  const chatBox = document.getElementById('chat-box');
  chatBox.innerHTML = "<p>Aucune conversation pour l'instant.</p>";
}

/***********************
 * mise à jour
 ***********************/
function updateStatus() {
  fetch('update_status.php')
    .then(response => response.json())
    .then(statuses => {
      const contactItems = document.querySelectorAll('.contact-item');
      contactItems.forEach(item => {
        const contactID = item.getAttribute('data-id');
        const statusElement = item.querySelector('.status');
        const status = statuses[contactID];
        statusElement.innerText = status;
        statusElement.style.color = status === 'en ligne' ? 'green' : 'red';
      });
    })
    .catch(error => console.error('Erreur lors de la mise à jour du statut:', error));
}

setInterval(updateStatus, 10000);
