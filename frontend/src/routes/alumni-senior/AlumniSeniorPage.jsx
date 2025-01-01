import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import BlogSection from '../BlogSection';
import OfficialCardSection from '../OfficialCardSection';
import AlumniDistributionSection from './AlumniDistributionSection';

export default function AlumniSeniorPage() {
  document.title = 'Alumni & Senior - CIMSA ULM';

  return (
    <>
      <PageHeader
        title='Alumni & Senior'
        description='Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga at sint
        fugit repudiandae consequuntur? Quidem eligendi aspernatur nisi debitis
        autem? Praesentium, dolorem voluptatibus cupiditate esse ratione
        repudiandae aut doloremque delectus.'
        myCss={css`
          margin-top: 100px;
          margin-bottom: 50px;
        `}
      />
      <AlumniDistributionSection />
      <br />
      <br />
      <BlogSection totalPosts={3} />
      <br />
      <br />
      <OfficialCardSection
        header={
          <div
            data-aos='zoom-in'
            data-aos-duration='1200'
            data-aos-once='true'
            css={css`
              color: white;
              text-align: center;
              padding-top: 26px;
              margin-bottom: -8px;
            `}
          >
            <h3>Are You a CIMSA ULM Alumni or Senior?</h3>
            <h4 style={{ fontWeight: 'normal' }}>
              Contact us! We'd love to hear from you.
            </h4>
          </div>
        }
        period={'2024-2025'}
        position={'Vice Local Coordinator'}
        picture={'https://avatars.githubusercontent.com/u/74972129?v=4'}
        // picture={
        //   'https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
        // }
        // picture={
        //   'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2024/07/LOME_Daniella-Enjelika-Sinaga-e1721380348578-300x300.png'
        // }
        name={'Muhammad Daffa Ilhami'}
        email={'mdaffailhami@gmail.com'}
        phone={'+62 812-3456-7890'}
      />
    </>
  );
}
