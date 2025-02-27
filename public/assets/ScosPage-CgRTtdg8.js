import{a as e,j as i,c as o,g as c,C as l,u as n,e as s,f as d,H as p,F as m,L as g,l as h}from"./index-B3h34kAm.js";import{P as f}from"./PageHeader-CC8t3psa.js";import{P as u}from"./PrimaryButton-q3RlGYL-.js";import{I as x}from"./Image-D_gdhdAJ.js";import{P as w}from"./PageMeta-OG5JkBvn.js";function b({sco:a,isComingSoon:t=!1}){return e("div",{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:i("div",{css:o`
          overflow: hidden;
          max-width: 449px;
          border-radius: 20px;
          background-color: white;
          border: 2px solid ${a.color};
          ${c(1.03)}

          @media (max-width: 511.9px) {
            margin: 0 16px;
          }
        `,children:[e(x,{src:a.logo,alt:a.name,css:o`
            width: 449px;
            height: 200px;
            object-fit: cover;
          `}),i("div",{css:o`
            padding: 20px;
            text-align: center;
          `,children:[i("p",{css:o`
              height: 74px;
              overflow: hidden;
              text-overflow: ellipsis;
              display: -webkit-box;
              -webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
            `,children:[a.description," ",a.description]}),e(u,{to:t?"":`/scos/${a.name.toLowerCase()}`,color:a.color,isLarge:!1,children:t?"Coming Soon":`More on ${a.name}`})]})]})})}function C({scos:a}){return e(l,{css:o`
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px 0;
        gap: 20px;
      `,children:a.map((t,r)=>e(b,{sco:t,isComingSoon:!t.background},r+1))})}function k(){const a=n(`${s}/api/page/scos`,d),t=n(`${s}/api/committe`,async r=>(await d(r)).data);return a.isLoading||t.isLoading?e(g,{}):a.error||t.error?e(h,{}):i(m,{children:[e(w,{title:"The SCOs - CIMSA ULM",description:"We organize our work through Standing Committees that represent focus areas of equal importance in order to maintain a balanced, holistic, and steady approach towards our targets and goals."}),i("main",{children:[e(f,{title:"Standing Committees",description:e(p,{html:a.data.contents.find(r=>r.column==="description").long_text_content})}),e("hr",{style:{color:"red",borderWidth:"1px",opacity:"1"}}),e(C,{scos:t.data}),e("br",{})]})]})}export{k as default};
