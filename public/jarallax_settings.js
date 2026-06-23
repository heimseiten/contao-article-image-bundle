jarallax(document.querySelectorAll('.article_bg.jarallax'), {
    speed: 0.2,
    imgElement: '.jarallax picture',
})

setHeightForHeroImage()
window.addEventListener('resize', setHeightForHeroImage)
function setHeightForHeroImage() {
    document.querySelectorAll('.jarallax.article_bg').forEach(e => {
        e.setAttribute( 'style', '--element-height: ' + e.clientHeight + 'px;' )
    })    
}
