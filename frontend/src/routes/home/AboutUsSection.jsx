import { Container } from 'react-bootstrap';
import { css } from '@emotion/react';
import { useEffect, useReducer } from 'react';
import PrimaryButton from '../PrimaryButton';

export default function AboutUsSection({ about, bgImage }) {
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
      {/* <ParallaxProvider>
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
      </ParallaxProvider> */}
      <div
        id='about-us-section-banner'
        css={css`
          background-image: url('${bgImage}');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
          width: 100%;
          height: 800px;
          filter: brightness(65%);
          background-attachment: fixed;
        `}
      />
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

          @media (min-width: 2000px) {
            padding: 4%;
            padding-left: 200px;
            padding-right: 200px;
          }
        `}
        data-aos='zoom-in'
        data-aos-once='true'
        data-aos-duration='1200'
      >
        <h1
          css={css`
            color: red;
            font-weight: bold;
            font-size: 32px;

            @media (min-width: 992px) {
              font-size: 44px;
            }
          `}
          data-aos='zoom-in'
          data-aos-once='true'
          data-aos-duration='1200'
        >
          About Us
        </h1>

        <p
          data-aos='zoom-in-down'
          data-aos-once='true'
          data-aos-duration='1200'
        >
          {about}
        </p>
        <br />
        <PrimaryButton to='/about-us'>Learn More</PrimaryButton>
      </Container>
    </div>
  );
}
