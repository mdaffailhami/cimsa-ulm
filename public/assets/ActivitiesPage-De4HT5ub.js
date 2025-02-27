import{j as n,c as i,a as t,C as r,R as l,b as o,F as g,u as h,e as p,f as u,H as s,L as f}from"./index-BGNEuXLa.js";import{P as c}from"./PrimaryButton-BpiKRK0A.js";import{P as x}from"./PageMeta-Ca_Qd669.js";function b({programsImage:a,programsDesc:e,trainingsDesc:d,trainingsImage:m}){return n("section",{css:i`
        padding-top: 10px;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: min-content 0 1fr 1fr 0 min-content;

        @media (min-width: 992px) {
          grid-template-columns: 1fr 0.1fr 1fr;
          grid-template-rows: 1fr 1fr;
        }
      `,children:[n("div",{css:i`
          position: relative;
          background-image: url('${a}');
          background-size: cover;
          background-position: center;
          background-attachment: fixed;
          width: 100%;
          height: 300px;

          @media (min-width: 992px) {
            height: 500px;
          }
        `,children:[t("div",{css:i`
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
          `}),t("h1",{css:i`
            position: absolute;
            color: white;
            font-weight: bold;
            top: 45%;
            left: 50%;
            transform: translateX(-50%);

            @media (min-width: 992px) {
              left: 20%;
              transform: none;
            }
          `,children:"Programs"})]}),t("div",{}),n(r,{css:i`
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;
          margin-top: 20px;

          @media (min-width: 992px) {
            margin-top: 0px;
          }
        `,children:[t("h1",{"data-aos":"zoom-out","data-aos-once":"true","data-aos-duration":"1200",style:{color:"red"},children:t("b",{children:"Our Programs"})}),t("p",{"data-aos":"fade-left","data-aos-once":"true","data-aos-duration":"1200",css:i`
            @media (min-width: 992px) {
              padding-right: 10%;
            }
          `,children:e}),t(c,{to:"/programs",isLarge:!0,children:"Learn More"})]}),n(r,{css:i`
          text-align: right;
          display: flex;
          flex-direction: column;
          justify-content: space-evenly;

          margin-top: 40px;
          margin-bottom: 30px;

          @media (min-width: 992px) {
            margin-bottom: 0px;
            margin-top: 0px;
          }
        `,children:[t("h1",{"data-aos":"zoom-out","data-aos-once":"true","data-aos-duration":"1200",style:{color:"red"},children:t("b",{children:"Our Trainings"})}),t("p",{"data-aos":"fade-right","data-aos-once":"true","data-aos-duration":"1200",css:i`
            @media (min-width: 992px) {
              padding-left: 10%;
            }
          `,children:d}),t(c,{to:"/trainings",isLarge:!0,children:"Learn More"})]}),t("div",{}),n("div",{css:i`
          position: relative;
          background-image: url('${m}');
          background-size: cover;
          background-position: center;
          background-attachment: fixed;
          width: 100%;
          height: 300px;

          @media (min-width: 992px) {
            height: 500px;
          }
        `,children:[t("div",{css:i`
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
          `}),t("h1",{css:i`
            position: absolute;
            color: white;
            font-weight: bold;
            top: 45%;
            left: 50%;
            transform: translateX(-50%);

            @media (min-width: 992px) {
              right: 20%;
              transform: none;
            }
          `,children:"Trainings"})]})]})}function w({nationalMeetingsDesc:a,nationalMeetingsEmbeddedYoutubeUrl:e,becomeDelegatesUrl:d}){return n(g,{children:[t(r,{fluid:!0,style:{background:"red",color:"white"},children:t(r,{style:{padding:"55px 0",maxWidth:"1140px"},children:n(l,{xs:1,lg:2,children:[n(o,{css:i`
                text-align: center;
                @media (min-width: 992px) {
                  text-align: left;
                }
              `,children:[t("h1",{"data-aos":"zoom-in-right","data-aos-once":"true","data-aos-duration":"1200",children:t("b",{children:"National Meetings"})}),t("p",{"data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",children:a}),n("p",{"data-aos":"zoom-out","data-aos-once":"true","data-aos-duration":"1200",style:{fontWeight:"bold"},children:[t("i",{className:"fa-solid fa-caret-right"}),"   Watch our video"]})]}),t(o,{children:t("center",{children:t("iframe",{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",width:"100%",css:i`
                    height: 260px;

                    @media (min-width: 768px) {
                      height: 500px;
                    }
                    @media (min-width: 992px) {
                      height: 315px;
                    }
                  `,src:e,title:"YouTube video player",frameBorder:"0",allow:"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share",referrerPolicy:"strict-origin-when-cross-origin",allowFullScreen:!0})})})]})})}),t(r,{style:{color:"red",padding:"66px 0",maxWidth:"1140px"},children:n(l,{xs:1,lg:2,children:[t(o,{css:i`
              text-align: center;
              margin-bottom: 12px;

              @media (min-width: 992px) {
                text-align: left;
                margin-bottom: 0px;
              }
            `,children:t("h1",{"data-aos":"fade-right","data-aos-once":"true","data-aos-duration":"1200",children:t("b",{children:"Interested to experience our national meetings?"})})}),t(o,{css:i`
              display: flex;
              justify-content: center;
              align-items: center;
            `,children:t(c,{to:d,children:t("b",{children:"BECOME OUR DELEGATES"})})})]})})]})}function k(){const a=h(`${p}/api/page/activities`,u);return a.isLoading?t(f,{}):a.error?t(LoadFailedPage,{}):n(g,{children:[t(x,{title:"Activities - CIMSA ULM",description:"Explore our various activities like our programs & our trainings at CIMSA ULM."}),n("main",{style:{lineHeight:"1.7"},children:[t(b,{programsImage:a.data.contents.find(e=>e.column==="programs-image").galleries[0].url,programsDesc:t(s,{html:a.data.contents.find(e=>e.column==="programs-description").long_text_content}),trainingsImage:a.data.contents.find(e=>e.column==="trainings-image").galleries[0].url,trainingsDesc:t(s,{html:a.data.contents.find(e=>e.column==="trainings-description").long_text_content})}),t("br",{}),t("br",{}),t(w,{nationalMeetingsDesc:t(s,{html:a.data.contents.find(e=>e.column==="national-meetings-description").long_text_content}),nationalMeetingsEmbeddedYoutubeUrl:a.data.contents.find(e=>e.column==="national-meetings-embedded-youtube-url").text_content,becomeDelegatesUrl:a.data.contents.find(e=>e.column==="become-delegates-url").text_content})]})]})}export{k as default};
