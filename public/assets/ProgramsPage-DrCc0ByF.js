import{a as t,j as i,c as r,g as y,B as w,b as v,R as C,C as f,p as P,r as I,s as A,u as m,e as h,f as p,H as s,F as u,L as B,l as S}from"./index-DkTcay3F.js";import{P as _}from"./PageHeader-C5IMF92k.js";import{C as g}from"./Carousel-D0z2yGCa.js";import{P as E}from"./PrimaryButton-DIU5uI2w.js";import{B as L}from"./BlogSection-CBOd7n1Y.js";import{P as R}from"./PageMeta-DmPFkgKF.js";import"./ElementChildren-CzulxJZo.js";import"./Card-BlmdRcri.js";import"./Image-DU9LAInX.js";function d({icon:n,title:a,subtitle:o,href:e}){return t(v,{"data-aos":"flip-right","data-aos-duration":"1200","data-aos-once":"true",className:"d-flex justify-content-center align-items-center",style:{marginBottom:"24px"},children:i(w,{css:r`
          ${y(1.1,r`
              background-color: white !important;
              border: white !important;
              color: red !important;
            `)}

          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          background-color: white;
          border-color: white;
          color: red;
          border-radius: 20px;
          width: 190px;
          height: 190px;
        `,href:e,children:[t("i",{className:n,style:{fontSize:"40px",margin:"20px 0"}}),t("h4",{style:{fontWeight:"bold",lineHeight:1.15},children:a}),t("p",{css:r`
            color: black;
            line-height: 1.3;
            font-size: 14px;

            @media (min-width: 576px) {
              font-size: 15.95px;
            }
          `,children:o})]})})}function H(){return t("div",{css:r`
        background-color: red;
      `,children:i(f,{css:r`
          padding-top: 24px;

          @media (min-width: 1100px) {
            width: 1100px;
          }
        `,children:[i("div",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",css:r`
            color: white;
            text-align: center;
            padding-top: 9px;
          `,children:[t("h3",{children:t("b",{children:"Thoroughly planned, clearly defined, and accountable efforts."})}),t("h4",{style:{fontWeight:"normal"},children:"We channel our endeavors through four core programs:"}),t("br",{})]}),i(C,{xs:2,sm:2,md:2,lg:4,children:[t(d,{href:"#activities",icon:"fa-solid fa-tasks",title:"ACTIVITIES",subtitle:"Real impacts"}),t(d,{href:"#advocacy",icon:"fa-solid fa-bullhorn",title:"ADVOCACY",subtitle:"Multisectoral approach"}),t(d,{href:"#research",icon:"fa-solid fa-chart-column",title:"RESEARCH",subtitle:"Data-driven"}),t(d,{href:"#capacity-building",icon:"fa-regular fa-circle-up",title:"CAPACITY BUILDING",subtitle:"Member empowerment"})]}),t("br",{})]})})}function c({id:n,title:a,body:o,images:e,endSection:l=!0}){return i(f,{id:n,css:r`
        /* margin-bottom: ${l?"0":"45px"}; */
        margin-bottom: 45px;
        text-align: center;

        @media (max-width: 1199.98px) {
          width: 100%;
        }
        @media (min-width: 1200px) {
          width: 960px;
        }
      `,children:[t("h2",{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",style:{color:"red",marginBottom:"14px"},children:t("b",{children:a})}),t(g,{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",css:r`
          overflow: hidden;
          border-radius: 20px;

          @media (min-width: 992px) {
            border-radius: 24px;
          }
        `,children:e.map((b,x)=>t(g.Item,{children:t("img",{css:r`
                width: 100%;
                object-fit: cover;
                height: 60vw;
                border-radius: 20px;

                @media (min-width: 992px) {
                  height: 520px;
                  border-radius: 24px;
                }
              `,src:b})},x))}),t("br",{}),t("p",{children:o}),t("br",{}),l&&t("hr",{})]})}function V(){const n=P();I.useEffect(()=>A(n.hash),[n]);const a=m(`${h}/api/page/programs`,p),o=m(`${h}/api/post?page=1&limit=3`,p);return a.isLoading||o.isLoading?t(B,{}):a.error||o.error?t(S,{}):i(u,{children:[t(R,{title:"Programs - CIMSA ULM",description:"We manifest the will to achieve our goals through ways that are relevant-to-the-issue, sustainable, and accountable."}),i("main",{children:[t(_,{title:"Our Programs",description:t(s,{html:a.data.contents.find(e=>e.column=="description").long_text_content})}),t(H,{}),t("br",{}),t("br",{}),t(c,{endSection:!1,id:"activities",title:"ACTIVITIES",body:t(s,{html:a.data.contents.find(e=>e.column=="activities-description").long_text_content}),images:a.data.contents.find(e=>e.column=="activities-images").galleries.map(e=>e.url)}),t(L,{includeEndDivider:!0,posts:o.data.data,header:i("center",{children:[t("h3",{children:t("b",{children:"We'll keep you updated."})}),t("h4",{style:{fontWeight:"normal",marginBottom:"15px"},children:"We publish our activities through our blog."})]})}),t("br",{}),t(c,{id:"advocacy",title:"ADVOCACY",body:t(s,{html:a.data.contents.find(e=>e.column=="advocacy-description").long_text_content}),images:a.data.contents.find(e=>e.column=="advocacy-images").galleries.map(e=>e.url)}),t(c,{id:"research",title:"RESEARCH",body:t(s,{html:a.data.contents.find(e=>e.column=="research-description").long_text_content}),images:a.data.contents.find(e=>e.column=="research-images").galleries.map(e=>e.url)}),t(c,{id:"capacity-building",title:"CAPACITY BUILDING",body:i(u,{children:[t(s,{html:a.data.contents.find(e=>e.column=="capacity-building-description").long_text_content}),t("br",{}),t("br",{}),i(E,{to:"/trainings",children:[t("i",{className:"fa-solid fa-arrow-right",style:{marginRight:"6.95px"}})," ","Our Trainers"]})]}),images:a.data.contents.find(e=>e.column=="capacity-building-images").galleries.map(e=>e.url)})]})]})}export{V as default};
