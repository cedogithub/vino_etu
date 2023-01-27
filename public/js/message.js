let messageBox = document.querySelector('#alert-5');
messageBox.addEventListener('onBlur', ()=>{
    messageBox.remove()
})
let xButton = document.querySelector('[data-dismiss-target]')
xButton.addEventListener('click', ()=>{
    console.log('x')
    messageBox.remove();
})
