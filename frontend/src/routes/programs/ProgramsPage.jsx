import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import ProgramsHeader from './ProgramsHeader';

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
    </>
  );
}
