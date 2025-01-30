import { useParams } from 'react-router';
import { endpoint } from '../../../configs';
import { setPageMeta } from '../../../utils';
import LoadingIndicator from '../../LoadingIndicator';
import { useEffect, useReducer, useState } from 'react';
import { css } from '@emotion/react';
import HeroSection from './HeroSection';
import { Container } from 'react-bootstrap';
import HtmlParser from '../../HtmlParser';
import FocusesMissionSection from './FocusesMissionSection';
import TestimonialsSection from './TestimonialsSection';
import BlogSection from '../../BlogSection';
import PrimaryButton from '../../PrimaryButton';
import UpcomingActivitiesSection from './UpcomingActivitiesSection';

export default function ScoDetailPage() {
  const [update, forceUpdate] = useReducer((x) => x + 1, 0);
  const { name } = useParams();

  const [sco, setSco] = useState(undefined);
  const [posts, setPosts] = useState(undefined);

  useEffect(() => {
    setSco(undefined);
    forceUpdate();
  }, [name]);

  useEffect(() => {
    document.title = 'SCO Detail - CIMSA ULM';

    (async () => {
      try {
        const res = await fetch(`${endpoint}/api/committe/${name}`);
        const res2 = await fetch(
          `${endpoint}/api/post?page=1&limit=3${
            process.env.NODE_ENV === 'production' ? `&category=${name}` : ''
          }`
        );
        const data = await res.json();
        const data2 = await res2.json();

        if (!data || !data2) throw new Error('Error fetching data');

        setPageMeta(`${data.data.name} - CIMSA ULM`, data.data.description);
        setSco(data.data);
        setPosts(data2.data);
      } catch (error) {
        alert(error);
      }
    })();
  }, [update]);

  if (!sco || !posts) return <LoadingIndicator />;

  return (
    <>
      <div
        css={css`
          /* background-image: url(${sco.background}); */
          background-image: url('https://froyonion.sgp1.digitaloceanspaces.com/images/blogdetail/3a67d8b8c68d4f067fe1dfee66e4f15947c8f4ae.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
          /* height: 100vh; */
          position: relative;
          display: flex;
          justify-content: center;
          color: ${sco.color};
        `}
      >
        <div
          css={css`
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(
              to top,
              ${sco.color},
              rgba(255, 255, 255, 0)
            );
          `}
        />
        <Container
          css={css`
            position: relative;
            max-width: 962px;
            z-index: 10;
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 32px;
            padding: 24px;

            @media (min-width: 768px) {
              padding: 40px;
            }

            @media (min-width: 992px) {
              padding: 40px 0;
            }
          `}
        >
          <HeroSection
            name={sco.name}
            description={<HtmlParser html={sco.long_description} />}
            images={sco.galleries.map((x) => x.url)}
          />
          <FocusesMissionSection
            focuses={sco.focuses}
            mission={<HtmlParser html={sco.mission_statement} />}
          />
          <TestimonialsSection
            testimonies={sco.testimonies}
            color={sco.color}
          />
        </Container>
      </div>
      <hr />
      <br />
      <Container>
        <BlogSection
          posts={posts}
          header={
            <>
              <h2
                className='text-center display-6'
                style={{ marginBottom: '18px' }}
              >
                RECENT {sco.name} ACTIVITY
              </h2>
              <hr
                style={{ borderWidth: '3px', opacity: 1, color: sco.color }}
              />
            </>
          }
          footer={
            <div className='d-flex justify-content-center'>
              <PrimaryButton
                color={sco.color}
                style={{ display: 'block', margin: '0 auto' }}
                to='/blog/all/1'
              >
                <b>Go to CIMSA Blog</b>
              </PrimaryButton>
            </div>
          }
        />
        <br />
        <br />
        <UpcomingActivitiesSection
          name={sco.name}
          color={sco.color}
          activities={sco.activities}
        />
      </Container>
    </>
  );
}
