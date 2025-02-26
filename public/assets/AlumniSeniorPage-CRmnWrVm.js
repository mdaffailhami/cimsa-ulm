import{j as o,c as e,a as t,u as r,e as s,f as d,H as c,F as m,L as l}from"./index-DkTcay3F.js";import{P as u}from"./PageHeader-C5IMF92k.js";import{B as p}from"./BlogSection-CBOd7n1Y.js";import{C as h}from"./ContactCardSection-DUyt7_cD.js";import{P as g}from"./PageMeta-DmPFkgKF.js";import"./PrimaryButton-DIU5uI2w.js";import"./Card-BlmdRcri.js";import"./Image-DU9LAInX.js";function f({image:a}){return o("div",{"data-aos":"zoom-out-up","data-aos-duration":"1200","data-aos-once":"true",css:e`
        border: 8px solid red;

        @media (min-width: 768px) {
          border: 15px solid red;
        }
      `,children:[t("div",{css:e`
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100px;
          background-color: red;
          color: white;
        `,children:t("h1",{"data-aos":"zoom-out","data-aos-duration":"1200","data-aos-once":"true",css:e`
            font-weight: bold;
            /* font-size: 36px; */
            text-align: center;
          `,children:"Distribution of Our Alumni"})}),t("img",{src:a,style:{width:"100vw",height:"auto",objectFit:"cover"}})]})}function C(){const a=r(`${s}/api/page/alumni-senior`,d),i=r(`${s}/api/post?page=1&limit=3`,d);return a.isLoading||i.isLoading?t(l,{}):a.error||i.error?t(LoadFailedPage,{}):o(m,{children:[t(g,{title:"Alumni & Senior - CIMSA ULM",description:"CIMSA ULM is forever thankful to those who have contributed their hearts, spirits, and time to making CIMSA ULM what it is today."}),o("main",{children:[t(u,{title:"Alumni & Senior",description:t(c,{html:a.data.contents.find(n=>n.column==="description").long_text_content})}),t(f,{image:a.data.contents.find(n=>n.column==="map-image").galleries[0].url}),t("br",{}),t("br",{}),t(p,{posts:i.data.data}),t("br",{}),t("br",{}),t(h,{header:o("div",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",css:e`
                color: white;
                text-align: center;
                padding-top: 26px;
                margin-bottom: -8px;
              `,children:[t("h3",{children:"Are You a CIMSA ULM Alumni or Senior?"}),t("h4",{style:{fontWeight:"normal"},children:"Contact us! We'd love to hear from you."})]}),period:a.data.contact.generation,position:a.data.contact.occupation,picture:a.data.contact.image,name:a.data.contact.name,email:a.data.contact.email,phone:a.data.contact.phone})]})]})}export{C as default};
