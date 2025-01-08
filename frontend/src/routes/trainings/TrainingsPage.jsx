import { css } from '@emotion/react';
import OfficialCardSection from '../OfficialCardSection';
import PageHeader from '../PageHeader';
import OurTrainersSection from './OurTrainersSection';

export default function TrainingsPage() {
  return (
    <>
      <PageHeader
        title='Our Trainings'
        description='True to our vision, CIMSA ULM aims to empower medical students in every possible aspect.'
      />
      <OurTrainersSection />
      <hr />
      <OfficialCardSection
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
