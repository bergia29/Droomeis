function openChat(name) {
  const isOnline = Math.random() > 0.5 ? "en ligne" : "hors connexion";
  localStorage.setItem('chatName', name); 
  localStorage.setItem('chatStatus', isOnline); 

  window.open("chat.html", "_blank"); 
}

/*********************
 * Chat  *
 *********************/
function loadChat() {
  const contactName = localStorage.getItem('chatName'); 
  const chatStatus = localStorage.getItem('chatStatus') || "hors connexion"; // statut

  if (contactName) {
    
    document.getElementById('chat-title').innerText = `Zone de Chat - ${contactName}`;
    document.getElementById("recipient-name").innerText = `Nom: ${contactName}`;
    document.getElementById("chat-status").innerText = `Statut: ${chatStatus}`;
    document.getElementById("chat-status").style.color = chatStatus === "en ligne" ? "green" : "red";

  
    const chatRecords = JSON.parse(localStorage.getItem(`chat_${contactName}`)) || [];
    const chatBox = document.getElementById('chat-box');

    if (chatRecords.length === 0) {
      chatBox.innerHTML = "<p>Aucune conversation pour l'instant.</p>"; 
     } else {
      chatRecords.forEach(record => {
        const messageHTML = `
          <div class="chat-message ${record.sender}">
            <p class="message-text">${record.message}</p>
            <span class="message-meta">${record.time}</span>
          </div>
        `;
        chatBox.innerHTML += messageHTML;
      });
    }
    chatBox.scrollTop = chatBox.scrollHeight; // jusqu'au bas
  } else {
    alert("Aucun utilisateur sélectionné !");
    window.close(); 
  }
}

// envoyer message
function sendMessage() {
  const messageInput = document.getElementById('message-input');
  const message = messageInput.value.trim();
  const contactName = localStorage.getItem('chatName'); // savoir le nom de contact

  if (message && contactName) {
    const currentTime = new Date().toLocaleTimeString();
    const chatBox = document.getElementById('chat-box');

    // afficher nouveaux messages
    const newMessage = `
      <div class="chat-message right">
        <p class="message-text">${message}</p>
        <span class="message-meta">${currentTime}</span>
      </div>
    `;
    chatBox.innerHTML += newMessage;
    chatBox.scrollTop = chatBox.scrollHeight;
    messageInput.value = "";

    // sauvegarder les conversations historiques
    const chatRecords = JSON.parse(localStorage.getItem(`chat_${contactName}`)) || [];
    chatRecords.push({ sender: "right", message: message, time: currentTime });
    localStorage.setItem(`chat_${contactName}`, JSON.stringify(chatRecords));
  }
}

function clearChatRecords(contactName) {
  localStorage.removeItem(`chat_${contactName}`);
  alert(`Les conversations avec ${contactName} ont été supprimées.`);
}
