import{j as n,c as a,a as t}from"./index-B3h34kAm.js";function s({title:o,description:d,titleColor:i="red",myCss:e=""}){return n("div",{css:a`
        margin-top: 100px;
        margin-bottom: 50px;
        padding: 0 20px;

        @media (min-width: 992px) {
          padding: 0 24%;
        }

        ${e}
      `,children:[t("h1",{"data-aos":"fade-down","data-aos-duration":"1200","data-aos-once":"true",css:a`
          text-align: center;
          color: ${i};
          font-weight: bold;

          font-size: 44px;

          @media (min-width: 768px) {
            font-size: 54px;
          }
        `,children:o}),t("hr",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",css:a`
          margin: 10px auto 20px auto;
          border-width: 2px;
          border-color: black;
          opacity: 1;

          width: 216px;

          @media (min-width: 768px) {
            border-width: 2px;
            width: 270px;
          }
        `}),t("p",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",css:a`
          text-align: center;
          font-size: 17px;

          @media (min-width: 768px) {
            font-size: 18px;
          }
        `,children:d})]})}export{s as P};
