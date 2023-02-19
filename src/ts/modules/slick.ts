import $ from 'jquery'
import 'slick-carousel'
import 'slick-carousel/slick/slick.css'
import 'slick-carousel/slick/slick-theme.css'

export const addDir = (obj: any) => {
  obj.attr('dir', 'rtl')
}

export const infinityScroll = () => {
  const sliderRight: any = $('.wp-block-gallery.is-style-infinity-scroll-right.has-nested-images')
  const sliderLeft: any = $('.wp-block-gallery.is-style-infinity-scroll-left.has-nested-images')
  if (!(sliderRight || sliderLeft)) {
    return
  }
  // 右向き
  addDir(sliderRight)
  infinityScrollInit(sliderRight, true)
  // 左向き
  infinityScrollInit(sliderLeft, false)
}

export const infinityScrollInit = (obj: any, rtl: boolean = false) => {
  obj.slick({
    autoplay: true, //自動でスクロール
    autoplaySpeed: 0, //自動再生のスライド切り替えまでの時間を設定
    speed: 5000, //スライドが流れる速度を設定
    cssEase: 'linear', //スライドの流れ方を等速に設定
    slidesToShow: 3, //表示するスライドの数
    swipe: true, // 操作による切り替えはさせない
    arrows: false, //矢印非表示
    pauseOnFocus: false, //スライダーをフォーカスした時にスライドを停止させるか
    pauseOnHover: false, //スライダーにマウスホバーした時にスライドを停止させるか
    rtl, //スライダーを左から右に流す（逆向き）
    responsive: [
      {
        breakpoint: 960,
        settings: {
          slidesToShow: 1.2,
        },
      },
    ],
  })
}
