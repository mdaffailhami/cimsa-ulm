import{r as i,d,j as r,a as t,c as n,L as l,R as c,C as f,F as u,g as m,b as p}from"./index-CYOINDUC.js";function e({iconClass:o,url:a}){return t(p,{xs:1,style:{width:"78px"},children:t("div",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",children:t("a",{href:a,target:"_blank",css:n`
            display: block;
            margin-bottom: 8px;

            ${m(1.175)}
          `,children:t("span",{style:{background:"red",borderRadius:"24%",padding:"10px 0 8px 0",display:"flex",justifyContent:"center",alignItems:"center"},children:t("i",{className:o,style:{color:"white",fontWeight:"bold",fontSize:"36px"}})})})})})}function x(){const o=i.useContext(d),a={facebook:o.socmeds.find(s=>s.platform=="facebook"),instagram:o.socmeds.find(s=>s.platform=="instagram"),x:o.socmeds.find(s=>s.platform=="twitter"),threads:o.socmeds.find(s=>s.platform=="thread"),youtube:o.socmeds.find(s=>s.platform=="youtube"),tiktok:o.socmeds.find(s=>s.platform=="tiktok")};return r(u,{children:[t("h1",{"data-aos":"fade-right","data-aos-duration":"1200","data-aos-once":"true",css:n`
          padding-bottom: 10px;
          text-align: center;

          font-size: 33px;

          @media (min-width: 768px) {
            font-size: 39px;
          }
        `,children:"Follow us on our social medias!"}),t(f,{css:n`
          padding-left: 13px;
          padding-right: 13px;

          @media (min-width: 992px) {
            padding-left: 10%;
            padding-right: 10%;
          }
        `,children:a?r(c,{className:"justify-content-center",style:{gap:"5px"},children:[a.facebook&&t(e,{iconClass:"fa-brands fa-facebook",url:a.facebook.url}),a.instagram&&t(e,{iconClass:"fa-brands fa-instagram",url:a.instagram.url}),a.x&&t(e,{iconClass:"fa-brands fa-x-twitter",url:a.x.url}),a.threads&&t(e,{iconClass:"fa-brands fa-threads",url:a.threads.url}),a.youtube&&t(e,{iconClass:"fa-brands fa-youtube",url:a.youtube.url}),a.tiktok&&t(e,{iconClass:"fa-brands fa-tiktok",url:a.tiktok.url})]}):t(l,{animation:"border",height:"100px"})})]})}export{x as S};
