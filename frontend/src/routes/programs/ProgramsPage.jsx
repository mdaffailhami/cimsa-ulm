import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import ProgramsHeader from './ProgramsHeader';
import ProgramSection from './ProgramSection';

export default function ProgramsPage() {
  document.title = 'Programs - CIMSA ULM';

  return (
    <>
      <PageHeader
        title='Our Programs'
        description='Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga at sint
        fugit repudiandae consequuntur? Quidem eligendi aspernatur nisi debitis
        autem? Praesentium, dolorem voluptatibus cupiditate esse ratione
        repudiandae aut doloremque delectus.'
        myCss={css`
          margin-top: 100px;
          margin-bottom: 50px;
        `}
      />
      <ProgramsHeader />
      <br />
      <ProgramSection
        id='advocacy'
        title='ADVOCACY'
        subtitle='We understand that reaching our goals would require a multifaceted effort. We identify our stakeholders and we advocate.'
        body={
          <p>
            With a basis of our policy documents, we approach stake-holders and
            advocate for issues relevant to our missions.
          </p>
        }
      />
    </>
  );
}
