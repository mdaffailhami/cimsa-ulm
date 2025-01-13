import { Container } from 'react-bootstrap';
import { css } from '@emotion/react';
import { CimsaContext } from '../../main';
import { useContext } from 'react';

export default function Banner() {
  const { profile } = useContext(CimsaContext);

  return (
    <div
      css={css`
        position: relative;
        height: 800px;
      `}
    >
      <div
        css={css`
          background: linear-gradient(
              to bottom,
              transparent,
              rgba(255, 0, 0, 0.15)
            ),
            url('https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif');
          background-size: cover;
          background-position: center;
          width: 100%;
          height: 100%;
          filter: brightness(70%);
        `}
      />
      <Container
        css={css`
          padding-left: 10%;
          padding-right: 10%;
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          color: white;
          text-align: center;
        `}
      >
        <h1
          id='banner-title'
          data-aos='fade-down'
          data-aos-duration='2500'
          css={css`
            font-weight: 600;
            font-size: 36px;

            @media (min-width: 992px) {
              font-size: 52px;
            }
          `}
        >
          CENTER FOR INDONESIAN MEDICAL STUDENTS' ACTIVITIES
        </h1>
        <br />
        {(() => {
          const University = ({ children }) => (
            <p
              className='lead'
              data-aos='fade-up'
              data-aos-duration='1200'
              css={css`
                font-size: 16px;

                @media (min-width: 992px) {
                  font-size: 26px;
                }
              `}
            >
              {children}
            </p>
          );

          if (!profile) {
            return <University>&nbsp;</University>;
          } else {
            return (
              <University>
                {profile
                  .find((item) => item.column == 'universitas')
                  .text_content.toUpperCase()}
              </University>
            );
          }
        })()}
        <hr
          style={{ border: '2px solid red', width: '200px' }}
          data-aos='zoom-in'
          data-aos-duration='2000'
        />
      </Container>
    </div>
  );
}
