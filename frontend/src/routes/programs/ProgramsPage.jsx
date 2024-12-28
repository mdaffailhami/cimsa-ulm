import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import ProgramsHeader from './ProgramsHeader';
import ProgramSection from './ProgramSection';
import { useEffect } from 'react';
import { useLocation } from 'react-router';
import { scrollById } from '../../utils';
import PrimaryButton from '../PrimaryButton';
import BlogSection from '../BlogSection';

export default function ProgramsPage() {
  const location = useLocation();
  document.title = 'Programs - CIMSA ULM';

  useEffect(() => scrollById(location.hash), [location]);

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
        endSection={false}
        id='activities'
        title='ACTIVITIES'
        subtitle='We understand that reaching our goals would require a multifaceted effort. We identify our stakeholders and we advocate.'
        body={
          <>
            <p>
              With a basis of our policy documents, we approach stake-holders
              and advocate for issues relevant to our missions.
            </p>
          </>
        }
      />
      <BlogSection
        includeEndDivider={true}
        totalPosts={3}
        header={
          <center>
            <h3>
              <b>We'll keep you updated.</b>
            </h3>
            <h4 style={{ fontWeight: 'normal', marginBottom: '15px' }}>
              We publish our activities through our blog.
            </h4>
          </center>
        }
      />
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
      <ProgramSection
        id='research'
        title='RESEARCH'
        subtitle='We understand that reaching our goals would require a multifaceted effort. We identify our stakeholders and we advocate.'
        body={
          <p>
            With a basis of our policy documents, we approach stake-holders and
            advocate for issues relevant to our missions.
          </p>
        }
      />
      <ProgramSection
        id='capacity-building'
        title='CAPACITY BUILDING'
        subtitle='We understand that reaching our goals would require a multifaceted effort. We identify our stakeholders and we advocate.'
        body={
          <>
            <p>
              With a basis of our policy documents, we approach stake-holders
              and advocate for issues relevant to our missions.
            </p>
            <PrimaryButton href>
              <i className='fa-solid fa-arrow-right' /> Our Trainers
            </PrimaryButton>
          </>
        }
      />
    </>
  );
}
