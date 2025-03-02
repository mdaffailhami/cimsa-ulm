import{a as t,j as n,c as d,g as m,b as g,C as s,R as u,u as c,e as l,f as p,H as h,F as x,L as f}from"./index-CdoKCSUK.js";import{C as b}from"./ContactCardSection-NwQS0D8g.js";import{P as w}from"./PageHeader-CQL2Q7Mw.js";import{C as r}from"./Card-BrVf6z4T.js";import{I as y}from"./Image-Bv3cQMHz.js";import{P as C}from"./PageMeta-D59WkTr3.js";function v({thumbnail:e,title:i,description:a,url:o}){return t(g,{style:{marginBottom:"24px"},"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:n(r,{as:"a",href:o,css:d`
          height: 433px;
          text-decoration: none;
          border-radius: 20px;
          overflow: hidden;
          box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.2);

          &:hover h3.card-title {
            text-decoration: underline;
          }

          ${m(1.05)}
        `,children:[t(r.Header,{style:{position:"relative",padding:"0",height:"250px"},children:t(y,{src:e,alt:i,style:{objectFit:"cover",width:"100%",height:"100%"}})}),n(r.Body,{style:{textAlign:"center"},children:[t(r.Title,{as:"h3",style:{fontSize:"23px",overflow:"hidden",textOverflow:"ellipsis",display:"-webkit-box",WebkitLineClamp:2,WebkitBoxOrient:"vertical",fontWeight:"bold"},children:i}),t(r.Text,{style:{overflow:"hidden",textOverflow:"ellipsis",display:"-webkit-box",WebkitLineClamp:5,WebkitBoxOrient:"vertical"},children:a})]})]})})}function k({description:e,trainers:i}){return t(s,{fluid:!0,style:{background:"red",padding:"14px 0 8px 0"},children:n(s,{children:[n(s,{css:d`
            color: white;
            text-align: center;
            max-width: 900px;
          `,children:[t("h2",{"data-aos":"fade-right","data-aos-duration":"1200","data-aos-once":"true",className:"h2 mb-4 mt-2",children:t("b",{children:"Get to know our trainers"})}),t("p",{"data-aos":"fade-left","data-aos-duration":"1200","data-aos-once":"true",style:{fontSize:"20px"},children:e})]}),t(u,{xs:1,sm:1,md:2,lg:2,xl:3,css:d`
            justify-content: center;
          `,children:i.map((a,o)=>t(v,{thumbnail:a.image,title:a.name,description:a.description,url:a.url},o+1))})]})})}function j(){const e=c(`${l}/api/page/trainings`,p),i=c(`${l}/api/training`,p);return e.isLoading||i.isLoading?t(f,{}):e.error||i.error?t(LoadFailedPage,{}):n(x,{children:[t(C,{title:"Trainings - CIMSA ULM",description:"CIMSA has an established capacity building system where members may become trainers that will act as peer educators on various topics."}),n("main",{children:[t(w,{title:"Our Trainings",description:t(h,{html:e.data.contents.find(a=>a.column==="description").long_text_content})}),t(k,{description:t(h,{html:e.data.contents.find(a=>a.column==="trainers-description").long_text_content}),trainers:i.data.data}),t("hr",{}),t(b,{period:e.data.contact.generation,position:e.data.contact.occupation,picture:e.data.contact.image,name:e.data.contact.name,email:e.data.contact.email,phone:e.data.contact.phone})]})]})}export{j as default};
