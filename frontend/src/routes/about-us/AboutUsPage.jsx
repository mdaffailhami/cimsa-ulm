import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import SDGsSection from './SDGsSection';
import IFMSASection from './IFMSASection';
import VisionMissionSection from './VisionMissionSection';

export default function AboutUsPage() {
  document.title = 'About Us - CIMSA ULM';

  return (
    <>
      <PageHeader
        title='About Us'
        description='Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga at sint
        fugit repudiandae consequuntur? Quidem eligendi aspernatur nisi debitis
        autem? Praesentium, dolorem voluptatibus cupiditate esse ratione
        repudiandae aut doloremque delectus.'
      />
      <SDGsSection />
      <IFMSASection />
      <VisionMissionSection />
      <hr />
    </>
  );
}
