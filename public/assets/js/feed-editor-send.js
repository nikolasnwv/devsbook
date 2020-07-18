let feedInput = document.querySelector('.feed-new-input');
let feedSubmit = document.querySelector('.feed-new-send');
let feedForm = document.querySelector('.feed-new-form');

feedSubmit.addEventListener('click', function(obj) {
    let value = feedInput.innerText;
    
    if (value != '') {
        feedForm.querySelector('input[name=bodyeditorsend]').value = value;
        feedForm.submit();
    }
});