import { Button, Col, Container, Row } from 'react-bootstrap';
import { css } from '@emotion/react';
import {
  Parallax,
  ParallaxBanner,
  ParallaxProvider,
} from 'react-scroll-parallax';
import { useEffect, useReducer } from 'react';

export default function AboutUsSection() {
  const [update, forceUpdate] = useReducer((x) => x + 1, 0);

  useEffect(() => {
    const onResize = () => forceUpdate();

    window.addEventListener('resize', onResize);

    return () => {
      window.removeEventListener('resize', onResize);
    };
  }, []);

  // Make About Us Section Banner height to be  based on the About Us Section Text inside
  useEffect(() => {
    const aboutUsSectionText = document.getElementById('about-us-section-text');
    const aboutUsSectionBanner = document.getElementById(
      'about-us-section-banner'
    );

    const height = aboutUsSectionText.clientHeight;
    aboutUsSectionBanner.style.height = `${height + 100}px`;
  }, [update]);

  return (
    <div style={{ position: 'relative' }}>
      <ParallaxProvider>
        <ParallaxBanner
          id='about-us-section-banner'
          style={{ width: '100%', height: '800px', filter: 'brightness(65%)' }}
          strength={800}
          layers={[
            {
              image:
                'https://www.shutterstock.com/image-photo/group-students-digital-tablet-laptop-600nw-2347371743.jpg',
              speed: -70,
            },
          ]}
        />
      </ParallaxProvider>
      <Container
        id='about-us-section-text'
        style={{
          position: 'absolute',
          top: '50%',
          left: '50%',
          transform: 'translate(-50%, -50%)',
          background: 'white',
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          borderRadius: '15px',
          color: 'black',
          textAlign: 'center',
        }}
        css={css`
          width: 86%;
          padding: 10%;

          @media (min-width: 992px) {
            width: 54%;
            padding: 4%;
            padding-left: 10%;
            padding-right: 10%;
          }
        `}
        data-aos='zoom-in'
        data-aos-once='true'
        data-aos-duration='1200'
      >
        <h1 style={{ color: 'red', fontWeight: 'bold' }}>About Us</h1>

        <p>
          CIMSA (Center for Indonesian Medical Students’ Activities) is an
          independent, non-profit and non-governmental organization, that
          centers on the Sustainable Development Goals. Through its vision,
          “Empowering Medical Students, Improving Nation’s Health”, CIMSA
          provides chances and experiences for medical students to express their
          opinions and idealisms through their social actions that will bring
          out tangible results for the development of this nation, especially in
          the medical field.
        </p>
        <br />
        <a href='/about-us'>
          <Button
            size='lg'
            style={{
              backgroundColor: 'red',
              borderColor: 'red',
              color: 'white',
            }}
          >
            Learn More
          </Button>
        </a>
      </Container>
    </div>
  );
}
