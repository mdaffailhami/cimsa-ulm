import{u as d,e as l,f as c,a,j as n,c as e,G as p,H as o,C as s,R as m,g,b as r,F as f,L as u}from"./index-BDacah9G.js";import{P as x}from"./PageHeader-BVeNowiG.js";import{P as h}from"./PrimaryButton-BkYAsUlW.js";import{P as b}from"./PageMeta-fADpcX7y.js";import{I as w}from"./ifmsa-logo-Dq4YJQFH.js";import{I as A}from"./Image-C1IGWyv_.js";function L(){const i=d(`${l}/api/page/about-ifmsa`,c);return i.isLoading?a(u,{}):i.error?a(LoadFailedPage,{}):n(f,{children:[a(b,{title:"About IFMSA - CIMSA ULM",description:"International Federation of Medical Students’ Association (IFMSA) adalah organisasi non-profit, non-pemerintah dan non-partisipan yang mewakili asosiasi mahasiswa kedokteran internasional.",ogImage:w}),n("main",{children:[a(p,{styles:e`
            ::selection {
              color: white;
              background-color: #1f3868;
            }
          `}),a(x,{title:"About IFMSA",description:a(o,{html:i.data.contents.find(t=>t.column==="description").long_text_content}),titleColor:"#1f3868"}),a(s,{fluid:!0,style:{background:"#1f3868",padding:"26.5px 0"},children:a(s,{"data-aos":"zoom-out-up","data-aos-duration":"1200","data-aos-once":"true",css:e`
              @media (min-width: 992px) {
                width: 720px;
              }
            `,children:n(m,{xs:1,className:"g-4",css:e`
                background: white;
                align-items: center;
                margin: 0;
                padding: 0 0 15.5px 0;
                border-radius: 30px;
                box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);

                ${g(1.02)}
              `,children:[a(r,{children:a("center",{children:a(A,{fluid:!0,alt:"IFMSA",src:i.data.contents.find(t=>t.column==="ifmsa-image").galleries[0].url,css:e`
                      border-radius: 30px;
                      box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);
                      width: 100%;
                    `})})}),n(r,{css:e`
                  display: flex;
                  flex-direction: column;
                  align-items: center;
                  padding-bottom: 8px;
                `,children:[a("p",{css:e`
                    color: black;
                    text-align: center;
                    padding: 0 12px;

                    @media (min-width: 576px) {
                      padding: 0 24px;
                    }

                    @media (min-width: 768px) {
                      padding: 0 34px;
                    }
                  `,children:a(o,{html:i.data.contents.find(t=>t.column==="ifmsa-description").long_text_content})}),n(h,{to:i.data.contents.find(t=>t.column==="ifmsa-url").text_content,target:"_blank",color:"#1f3868",isLarge:!1,children:["  ",a("i",{className:"fa-solid fa-arrow-right",style:{marginRight:"6.95px"}}),"     IFMSA       "]})]})]})})}),a("hr",{})]})]})}export{L as default};
