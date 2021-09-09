const sections = document.querySelectorAll('.section_container')
const buttonCloseModal = document.querySelectorAll('.modal button')
function closeModal() {
    this.parentElement.setAttribute('aria-modal', 'false')
    this.parentElement.nextElementSibling.style.display = "none"
}
sections.forEach((section) => {
    section.addEventListener('click', () => {
        let modal = section.nextElementSibling
        let modalOverlay = modal.nextElementSibling
        modal.setAttribute('aria-modal', 'true')
        modalOverlay.style.display = "block"
    })
})
buttonCloseModal.forEach(button => {
    button.addEventListener('click', closeModal)
})

