let markAsReadBtn = document.querySelectorAll('.notif button');
let csrf = document.querySelector('meta[name="csrf-token"]').content;

async function markAsRead(id){
    return await fetch('/panel/mark-as-read', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf,
        },
        body: JSON.stringify({
            id: id
        })
    });
}

markAsReadBtn.forEach(function (btn){
    btn.addEventListener('click', function (el){
        markAsRead(el.currentTarget.dataset.id)
            .catch((err) => {
                console.log(err)
            });
        el.currentTarget.parentNode.remove();
    })
})

