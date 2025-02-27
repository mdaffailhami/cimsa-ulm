import { useParams } from 'react-router';
import { endpoint } from '../../../configs';
import { fetchJSON } from '../../../utils';
import LoadingPage from '../../../components/LoadingPage';
import LoadFailedPage from '../../../components/LoadFailedPage';
import { useEffect } from 'react';
import { css, Global } from '@emotion/react';
import HeroSection from './HeroSection';
import { Container } from 'react-bootstrap';
import HtmlParser from '../../../components/HtmlParser';
import FocusesMissionSection from './FocusesMissionSection';
import TestimonialsSection from './TestimonialsSection';
import BlogSection from '../../../components/BlogSection';
import PrimaryButton from '../../../components/PrimaryButton';
import UpcomingActivitiesSection from './UpcomingActivitiesSection';
import ContactCardSection from '../../../components/ContactCardSection';
import useSWR from 'swr';
import PageMeta from '../../../components/PageMeta';

export default function ScoDetailPage() {
  const { name } = useParams();

  const sco = useSWR(`${endpoint}/api/committe/${name}`, fetchJSON);
  const posts = useSWR(
    `${endpoint}/api/post?page=1&limit=3&category=${name}`,
    fetchJSON
  );

  useEffect(() => {
    sco.mutate();
    posts.mutate();
  }, [name]);

  if (sco.isLoading || posts.isLoading) return <LoadingPage />;

  if (sco.error || posts.error) return <LoadFailedPage />;

  return (
    <>
      <PageMeta
        title={`${sco.data.data.name} - CIMSA ULM`}
        description={sco.data.data.description}
      />
      <main>
        <Global
          styles={css`
            ::selection {
              color: white;
              background-color: ${sco.data.data.color};
            }
          `}
        />
        <div
          css={css`
            background-image: url(${sco.data.data.background});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* height: 100vh; */
            position: relative;
            display: flex;
            justify-content: center;
            color: ${sco.data.data.color};
          `}
        >
          <div
            css={css`
              position: absolute;
              width: 100%;
              height: 100%;
              background: linear-gradient(
                to top,
                ${sco.data.data.color},
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
              name={sco.data.data.name}
              description={<HtmlParser html={sco.data.data.long_description} />}
              images={sco.data.data.galleries.map((x) => x.url)}
            />
            <FocusesMissionSection
              focuses={sco.data.data.focuses}
              mission={<HtmlParser html={sco.data.data.mission_statement} />}
            />
            <TestimonialsSection
              testimonies={sco.data.data.testimonies}
              color={sco.data.data.color}
            />
          </Container>
        </div>
        <hr />
        <br />
        <Container>
          <BlogSection
            posts={posts.data.data}
            header={
              <>
                <h2
                  className='text-center display-6'
                  style={{
                    marginBottom: '18px',
                    color: sco.data.data.color,
                    fontWeight: 'bold',
                  }}
                >
                  RECENT {sco.data.data.name} ACTIVITY
                </h2>
                <hr
                  style={{
                    borderWidth: '3px',
                    opacity: 1,
                    color: sco.data.data.color,
                  }}
                />
              </>
            }
            footer={
              <div className='d-flex justify-content-center'>
                <PrimaryButton
                  color={sco.data.data.color}
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
            name={sco.data.data.name}
            color={sco.data.data.color}
            activities={sco.data.data.activities}
          />
        </Container>
        <br />
        <hr />
        <ContactCardSection
          period={sco.data.data.contact.generation}
          position={sco.data.data.contact.occupation}
          picture={sco.data.data.contact.image}
          name={sco.data.data.contact.name}
          email={sco.data.data.contact.email}
          phone={sco.data.data.contact.phone}
        />
      </main>
    </>
  );
}
