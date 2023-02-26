import $ from 'jquery'

export const accordion: any = $(() => {
  $('.js-accordion').on('click', function () {
    $(this).toggleClass('open')
    $(this).next('.js-accordion-content').slideToggle(300)
  })
})
