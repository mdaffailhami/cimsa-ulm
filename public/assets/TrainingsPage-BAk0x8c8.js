import{a as t,j as n,c as s,g as m,b as g,C as o,R as u,u as d,e as c,f as l,H as p,F as x,L as f}from"./index-DOx3K9Sw.js";import{C as b}from"./ContactCardSection-Cdfs5X_e.js";import{P as w}from"./PageHeader-6WJnjNPt.js";import{C as r}from"./Card-CvZpgFWD.js";import{I as y}from"./Image-BVDg7mpA.js";import{P as C}from"./PageMeta-gyFUgdqE.js";function v({thumbnail:e,title:i,description:a,url:h}){return t(g,{style:{marginBottom:"24px"},"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:n(r,{as:"a",href:h,css:s`
          height: 433px;
          text-decoration: none;
          border-radius: 20px;
          overflow: hidden;
          box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.2);

          &:hover h3.card-title {
            text-decoration: underline;
          }

          ${m(1.05)}
        `,children:[t(r.Header,{style:{position:"relative",padding:"0",height:"250px"},children:t(y,{src:e,alt:i,style:{objectFit:"cover",width:"100%",height:"100%"}})}),n(r.Body,{style:{textAlign:"center"},children:[t(r.Title,{as:"h3",style:{fontSize:"23px",overflow:"hidden",textOverflow:"ellipsis",display:"-webkit-box",WebkitLineClamp:2,WebkitBoxOrient:"vertical",fontWeight:"bold"},children:i}),t(r.Text,{style:{overflow:"hidden",textOverflow:"ellipsis",display:"-webkit-box",WebkitLineClamp:5,WebkitBoxOrient:"vertical"},children:a})]})]})})}function k({description:e,trainers:i}){return t(o,{fluid:!0,style:{background:"red",padding:"14px 0 8px 0"},children:n(o,{children:[n(o,{css:s`
            color: white;
            text-align: center;
            max-width: 900px;
          `,children:[t("h2",{"data-aos":"fade-right","data-aos-duration":"1200","data-aos-once":"true",class:"h2 mb-4 mt-2",children:t("b",{children:"Get to know our trainers"})}),t("p",{"data-aos":"fade-left","data-aos-duration":"1200","data-aos-once":"true",style:{fontSize:"20px"},children:e})]}),t(u,{xs:1,sm:1,md:2,lg:2,xl:3,css:s`
            justify-content: center;
          `,children:i.map(a=>t(v,{thumbnail:a.image,title:a.name,description:a.description,url:a.url}))})]})})}function j(){const e=d(`${c}/api/page/trainings`,l),i=d(`${c}/api/training`,l);return e.isLoading||i.isLoading?t(f,{}):e.error||i.error?t(LoadFailedPage,{}):n(x,{children:[t(C,{title:"Trainings - CIMSA ULM",description:"CIMSA has an established capacity building system where members may become trainers that will act as peer educators on various topics."}),n("main",{children:[t(w,{title:"Our Trainings",description:t(p,{html:e.data.contents.find(a=>a.column==="description").long_text_content})}),t(k,{description:t(p,{html:e.data.contents.find(a=>a.column==="trainers-description").long_text_content}),trainers:i.data.data}),t("hr",{}),t(b,{period:e.data.contact.generation,position:e.data.contact.occupation,picture:e.data.contact.image,name:e.data.contact.name,email:e.data.contact.email,phone:e.data.contact.phone})]})]})}export{j as default};
