$("select").select2({
    theme: "bootstrap-5",
});

let contactButton = $('#contactButton')
contactButton.click(e => {
    e.preventDefault()
    $('#contactForm').slideDown();
    contactButton.slideUp();
})
