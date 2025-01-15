import PageHeader from '../PageHeader';
import ProgramsHeader from './ProgramsHeader';
import ProgramSection from './ProgramSection';
import { useEffect, useState } from 'react';
import { useLocation } from 'react-router';
import { scrollById, setPageMeta } from '../../utils';
import PrimaryButton from '../PrimaryButton';
import BlogSection from '../BlogSection';
import LoadingIndicator from '../LoadingIndicator';
import { endpoint } from '../../configs';

export default function ProgramsPage() {
  const description =
    'We manifest the will to achieve our goals through ways that are relevant-to-the-issue, sustainable, and accountable.';

  setPageMeta('Programs - CIMSA ULM', description);

  const location = useLocation();

  useEffect(() => scrollById(location.hash), [location]);

  const [programs, setPrograms] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/program`);

        setPrograms((await res.json()).data);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!programs) {
    return <LoadingIndicator />;
  }

  return (
    <>
      <PageHeader title='Our Programs' description={description} />
      <ProgramsHeader />
      <br />
      <ProgramSection
        endSection={false}
        id='activities'
        title='ACTIVITIES'
        // subtitle={
        //   programs.find((item) => item.name.toUpperCase() === 'ACTIVITIES')
        //     .description
        // }
        body={
          <>
            <p>
              {
                programs.find(
                  (item) => item.name.toUpperCase() === 'ACTIVITIES'
                ).description
              }
            </p>
          </>
        }
        // 'https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
        images={programs
          .find((item) => item.name.toUpperCase() === 'ACTIVITIES')
          .galleries.map((gallery, i) => gallery.url)}
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
        // subtitle={
        //   programs.find((item) => item.name.toUpperCase() === 'ADVOCACY')
        //     .description
        // }
        body={
          <p>
            {
              programs.find((item) => item.name.toUpperCase() === 'ADVOCACY')
                .description
            }
          </p>
        }
        images={programs
          .find((item) => item.name.toUpperCase() === 'ADVOCACY')
          .galleries.map((gallery, i) => gallery.url)}
      />
      <ProgramSection
        id='research'
        title='RESEARCH'
        // subtitle={
        //   programs.find((item) => item.name.toUpperCase() === 'RESEARCH')
        //     .description
        // }
        body={
          <p>
            {
              programs.find((item) => item.name.toUpperCase() === 'RESEARCH')
                .description
            }
          </p>
        }
        images={programs
          .find((item) => item.name.toUpperCase() === 'RESEARCH')
          .galleries.map((gallery, i) => gallery.url)}
      />
      <ProgramSection
        id='capacity-building'
        title='CAPACITY BUILDING'
        // subtitle={
        //   programs.find(
        //     (item) => item.name.toUpperCase() === 'CAPACITY BUILDING'
        //   ).description
        // }
        body={
          <>
            <p>
              {
                programs.find(
                  (item) => item.name.toUpperCase() === 'CAPACITY BUILDING'
                ).description
              }
            </p>
            <PrimaryButton to='/activities/trainings'>
              <i
                className='fa-solid fa-arrow-right'
                style={{ marginRight: '6.95px' }}
              />{' '}
              Our Trainers
            </PrimaryButton>
          </>
        }
        images={programs
          .find((item) => item.name.toUpperCase() === 'CAPACITY BUILDING')
          .galleries.map((gallery, i) => gallery.url)}
      />
    </>
  );
}
