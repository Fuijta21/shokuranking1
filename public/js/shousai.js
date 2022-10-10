.star{
  &-rating{
    position: relative;
    font-size: $star-width; //星の大きさ。変数で指定
    &::before, &::after{
      content: "★★★★★";
      color: #e1e1e1;   //グレー
      position: absolute;
      top: 0;
      left: 0;
    }
    &::after{
      color: #ffb448;  //黄色
      overflow: hidden;
    }
  }
}
